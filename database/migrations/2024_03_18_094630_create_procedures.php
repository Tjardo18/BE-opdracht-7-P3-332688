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
                        allergeen.naam AS ANaam,
                        allergeen.omschrijving
                    FROM
                        allergeen
                    INNER JOIN
                        productperallergeen ON productperallergeen.allergeenId = allergeen.id
                    INNER JOIN
                        product ON product.id = productperallergeen.productId
                    WHERE
                        product.id = p_id
                    ORDER BY
                        ANaam ASC;
                END");

        DB::select("DROP PROCEDURE IF EXISTS getProduct");
        DB::unprepared("CREATE PROCEDURE getProduct(IN p_id INT)
                    BEGIN
                        SELECT
                            product.naam AS PNaam,
                            product.barcode
                        FROM
                            product
                        WHERE
                            product.id = p_id;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancier");
        DB::unprepared("CREATE PROCEDURE getLeverancier(IN p_id INT)
                    BEGIN
                        SELECT
                            leverancier.naam AS LNaam,
                            leverancier.contactPersoon,
                            leverancier.leverancierNummer,
                            leverancier.mobiel,
                            product.naam AS PNaam,
                            IFNULL(magazijn.aantalAanwezig, 0) AS AantalAanwezig,
                            productperleverancier.datumLevering,
                            productperleverancier.aantal,
                            productperleverancier.datumEerstVolgendeLevering AS DatumEVL
                        FROM
                            leverancier
                        INNER JOIN
                            productperleverancier ON leverancier.id = productperleverancier.leverancierId
                        INNER JOIN
                            product ON productperleverancier.productId = product.id
                        LEFT JOIN
                            magazijn ON product.id = magazijn.productId
                        WHERE
                            product.id = p_id
                        ORDER BY
                            productperleverancier.datumLevering ASC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeverancierIndividual");
        DB::unprepared("CREATE PROCEDURE getLeverancierIndividual()
                    BEGIN
                        SELECT
                            leverancier.id,
                            leverancier.naam AS Naam,
                            leverancier.contactPersoon AS ContactPersoon,
                            leverancier.leverancierNummer AS LeverancierNummer,
                            leverancier.mobiel AS Mobiel,
                            COUNT(DISTINCT productperleverancier.productId) AS ProductCount
                        FROM
                            leverancier
                        LEFT JOIN
                            productperleverancier ON leverancier.id = productperleverancier.leverancierId
                        GROUP BY
                            leverancier.id, leverancier.naam, leverancier.contactPersoon, leverancier.leverancierNummer, leverancier.mobiel
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
                            Product.Id,
                            Product.Barcode,
                            Product.Naam,
                            Magazijn.VerpakkingsEenheid,
                            IFNULL(Magazijn.AantalAanwezig, 0) AS AantalAanwezig
                        FROM
                            Product
                        LEFT JOIN
                            Magazijn ON Product.Id = Magazijn.ProductId
                        ORDER BY
                            Product.Barcode ASC;
                    END");

        DB::select("DROP PROCEDURE IF EXISTS getLeveringen");
        DB::unprepared("CREATE PROCEDURE getLeveringen(IN l_id INT)
                    BEGIN
                        SELECT
                            product.id AS Pid,
                            product.naam AS PNaam,
                            magazijn.VerpakkingsEenheid AS VerpakkingsEenheid,
                            productperleverancier.datumLevering AS DatumLevering,
                            IFNULL(magazijn.AantalAanwezig, 0) AS AantalAanwezig
                        FROM
                            leverancier
                        JOIN
                            productperleverancier ON leverancier.id = productperleverancier.LeverancierId
                        JOIN
                            product ON productperleverancier.productId = product.id
                        JOIN
                            magazijn ON product.id = magazijn.productId
                        JOIN
                            (SELECT productId, MAX(datumLevering) as maxDatumLevering
                             FROM productperleverancier
                             GROUP BY productId) as sub
                        ON
                            productperleverancier.productId = sub.productId AND
                            productperleverancier.datumLevering = sub.maxDatumLevering
                        WHERE
                            leverancier.id = l_id
                        ORDER BY
                            AantalAanwezig DESC;
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
    }
};
