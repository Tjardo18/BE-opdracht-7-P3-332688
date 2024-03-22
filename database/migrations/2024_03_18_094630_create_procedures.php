<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::select("DROP PROCEDURE IF EXISTS getAllergien");
        DB::unprepared("CREATE PROCEDURE getAllergien(IN p_id INT)
                BEGIN
                    SELECT
                        a.naam AS ANaam,
                        a.omschrijving
                    FROM
                        allergeen a
                    INNER JOIN
                        productperallergeen ppa ON ppa.allergeenId = a.id
                    INNER JOIN
                        product p ON p.id = ppa.productId
                    WHERE
                        p.id = p_id
                    ORDER BY
                        ANaam ASC;
                END");

        DB::select("DROP PROCEDURE IF EXISTS getProduct");
        DB::unprepared("CREATE PROCEDURE getProduct(IN p_id INT)
                    BEGIN
                        SELECT
                            p.naam AS PNaam,
                            p.barcode
                        FROM
                            product p
                        WHERE
                            p.id = p_id;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancier");
        DB::unprepared("CREATE PROCEDURE getLeverancier(IN p_id INT)
                    BEGIN
                        SELECT
                            l.naam AS LNaam,
                            l.contactPersoon,
                            l.leverancierNummer,
                            l.mobiel,
                            p.naam AS PNaam,
                            IFNULL(m.aantalAanwezig, 0) AS AantalAanwezig,
                            ppl.datumLevering,
                            ppl.aantal,
                            ppl.datumEerstVolgendeLevering AS DatumEVL
                        FROM
                            leverancier l
                        INNER JOIN
                            productperleverancier ppl ON l.id = ppl.leverancierId
                        INNER JOIN
                            product p ON ppl.productId = p.id
                        LEFT JOIN
                            magazijn m ON p.id = m.productId
                        WHERE
                            p.id = p_id
                        ORDER BY
                            ppl.datumLevering ASC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancierIndividual");
        DB::unprepared("CREATE PROCEDURE getLeverancierIndividual()
                    BEGIN
                        SELECT
                            l.id,
                            l.naam AS Naam,
                            l.contactPersoon AS ContactPersoon,
                            l.leverancierNummer AS LeverancierNummer,
                            l.mobiel AS Mobiel,
                            COUNT(DISTINCT ppl.productId) AS ProductCount
                        FROM
                            leverancier l
                        LEFT JOIN
                            productperleverancier ppl ON l.id = ppl.leverancierId
                        GROUP BY
                            l.id, l.naam, l.contactPersoon, l.leverancierNummer, l.mobiel
                        ORDER BY
                            ProductCount DESC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancierById");
        DB::unprepared("CREATE PROCEDURE getLeverancierById(IN l_id INT)
                    BEGIN
                        SELECT
                            id,
                            Naam,
                            ContactPersoon,
                            leverancierNummer,
                            mobiel
                        FROM
                            leverancier
                        WHERE
                            id = l_id;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancierByProductId");
        DB::unprepared("CREATE PROCEDURE getLeverancierByProductId(IN p_id INT)
                    BEGIN
                        SELECT
                            leverancierId
                        FROM
                            productperleverancier
                        WHERE
                            productId = p_id;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getOverzicht");
        DB::unprepared("CREATE PROCEDURE getOverzicht()
                    BEGIN
                        SELECT
                            p.Id,
                            p.Barcode,
                            p.Naam,
                            m.VerpakkingsEenheid,
                            IFNULL(m.AantalAanwezig, 0) AS AantalAanwezig
                        FROM
                            product p
                        LEFT JOIN
                            magazijn m ON p.Id = m.ProductId
                        ORDER BY
                            p.Barcode ASC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeveringen");
        DB::unprepared("CREATE PROCEDURE getLeveringen(IN l_id INT)
                    BEGIN
                        SELECT
                            p.id AS Pid,
                            p.naam AS PNaam,
                            m.VerpakkingsEenheid AS VerpakkingsEenheid,
                            ppl.datumLevering AS DatumLevering,
                            IFNULL(m.AantalAanwezig, 0) AS AantalAanwezig
                        FROM
                            leverancier l
                        JOIN
                            productperleverancier ppl ON l.id = ppl.LeverancierId
                        JOIN
                            product p ON ppl.productId = p.id
                        JOIN
                            magazijn m ON p.id = m.productId
                        JOIN
                            (SELECT productId, MAX(datumLevering) as maxDatumLevering
                             FROM productperleverancier
                             GROUP BY productId) as sub
                        ON
                            ppl.productId = sub.productId AND
                            ppl.datumLevering = sub.maxDatumLevering
                        WHERE
                            l.id = l_id
                        ORDER BY
                            AantalAanwezig DESC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancierInfo");
        DB::unprepared("CREATE PROCEDURE getLeverancierInfo(IN l_id INT)
                    BEGIN
                        SELECT
                            l.naam AS Lnaam,
                            l.contactPersoon,
                            l.leverancierNummer,
                            l.mobiel,
                            c.id AS contactId,
                            c.straat,
                            c.huisnummer,
                            c.postcode,
                            c.stad
                        FROM
                            leverancier l
                        INNER JOIN
                            contact c ON l.contactId = c.id
                        WHERE
                            l.id = l_id;
                    END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS getAllergien");
        DB::unprepared("DROP PROCEDURE IF EXISTS getProduct");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeverancier");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeverancierIndividual");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeverancierById");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeverancierByProductId");
        DB::unprepared("DROP PROCEDURE IF EXISTS getOverzicht");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeveringen");
        DB::unprepared("DROP PROCEDURE IF EXISTS getLeverancierInfo");
    }
};
