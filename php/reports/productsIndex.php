<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gibrosen Fire Safety Products MIS</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="shortcut icon" href="../../images/favicon.png" />
        <?php
        session_start();
        ?>
        <script src="jquery-1.9.1.min.js"></script>
        <script src="jquery.canvasjs.min.js"></script>
        <?php require 'productsChart.php'?>
    </head>

    <body>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    Filter by:
                    <select  class="form-control selectpicker input-sm" data-style="btn-primary" id="selectFilter">
                        <option value="month" selected="selected" disabled="disabled">Filter Report</option>
                        <option value="month">By Month</option>
                        <option value="year">By Year</option>
                        <option value="type">By Item Type</option>
                    </select>
                </div>
            </div>
            <?php require 'require/selectyear.php'?>

        </div>
        <br>

        <div id="chartContainer1" class="month reporttype" style="width: 100%; height: 300px;"></div>
        <div id="chartContainer2" class="year reporttype" style="width: 100%; height: 300px;"></div>
        <div id="chartContainer3" class="type reporttype" style="width: 100%; height: 300px;"></div>

        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <script>
            $(document).ready(function () {
                $('#walkInDataTable').dataTable();             
            });      
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("select").change(function(){
                    $(this).find("option:selected").each(function(){
                        var optionValue = $(this).attr("value");
                        if(optionValue){
                            $(".reporttype").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else{
                            $(".reporttype").hide();
                        }
                    });
                }).change();
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#pyear").on('change', function(){
                    var year=$(this).val();
                    window.location = 'productsIndex.php?year='+year;
                });
            });
        </script>

    </body>
</html>