    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tablero Principal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tablero Principal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!---------------- TARGETAS INFORMATIVAS ----------------->
            <div class="row">
                <div class="col-lg-2">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4 id="totalProductos"></h4>
                            <p>Producto Registrado</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4 id="totalCompras"></h4>
                            <p>Total Compras</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4 id="totalVentas"></h4>
                            <p>Total Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cart"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4 id="ganancias"></h4>
                            <p>Total Ganancias</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-pie"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4 id="productosPocoStock">15</h4>
                            <p>Producto Poco Stock</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-2">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h4 id="ventasHoy"></h4>
                            <p>Ventas del dia</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">Mas Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barchart" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "ajax/dashboard.ajax.php",
                method: 'POST',
                dataType: 'json',
                success: function(respuesta) {
                    console.log("respuesta", respuesta);
                    $("#totalProductos").html(respuesta[0]['totalProductos'])
                    $("#totalCompras").html('L./' + respuesta[0]['totalCompras'])
                    $("#totalVentas").html('L./' + respuesta[0]['totalVentas'])
                    $("#ganancias").html('L./' + respuesta[0]['ganancias'])
                    $("#productosPocoStock").html(respuesta[0]['productosPocoStock'])
                    $("#ventasHoy").html('L./' + respuesta[0]['ventasHoy'])

                }
            });

            setInterval(() => {
                $.ajax({
                    url: "ajax/dashboard.ajax.php",
                    method: 'POST',
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log("respuesta", respuesta);
                        $("#totalProductos").html(respuesta[0]['totalProductos'])
                        $("#totalCompras").html('L./' + respuesta[0]['totalCompras'])
                        $("#totalVentas").html('L./' + respuesta[0]['totalVentas'])
                        $("#ganancias").html('L./' + respuesta[0]['ganancias'])
                        $("#productosPocoStock").html(respuesta[0]['productosPocoStock'])
                        $("#ventasHoy").html('L./' + respuesta[0]['ventasHoy'])
                    }
                });

            }, 10000);

            $.ajax({
                    url: "ajax/dashboard.ajax.php",
                    method: 'POST',
                    data: {
                        'accion': 1 //Obtener las ventas del mes , parametro
                    },
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log("respuesta", respuesta);
                        var fecha_venta = [];
                        var total_venta = [];
                        var total_ventas_mes = 0;

                        for (let i = 0; i < respuesta.length; i++) {
                            fecha_venta.push(respuesta[i]['fecha_venta']);
                            total_venta.push(respuesta[i]['total_venta']);
                            total_ventas_mes = parseFloat(total_ventas_mes) + parseFloat(respuesta[i]['total_venta']);
                        }

                        console.log(total_ventas_mes);
                        $(".card-title").html('Ventas del Mes: L./ ' + parseFloat(total_ventas_mes));

                        //Grafico de barras
                        var barChartCanvas = $("#barChart").get(0).getContext('2d');
                        var areaChartData = {
                            labels: fecha_venta,
                            datasets: [{
                                label: 'Ventas del Mes',
                                backgroundColor: 'rgba(60,141,188,0,9',
                                data: total_venta
                            }
                        ]
                        }

                        var barChartData = $.extend(true, {}, areaChartData);
                        var temp0 = areaChartData.datasets[0];
                        barChartData.datasets[0] = temp0;

                        var barChartOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                            events: false,
                            legend: {
                                display: true
                            },
                            animation: {
                                duration: 500,
                                easing: "easeOutQuart",
                                onComplete: function() {
                                    var ctx = this.chart.ctx;
                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';

                                    this.data.datasets.forEach(function(dataset) {
                                        for (var i = 0; i < dataset.data.length; i++) {
                                            var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                                scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                                            ctx.fillStyle = '#444';
                                            var y_pos = model.y - 5;
                                            if ((scale_max - model.y) / scale_max >= 0.93)
                                                y_pos = model.y + 20;
                                            ctx.fillText(dataset.data[i], model.x, y_pos);
                                        }
                                    });
                            }
                        }
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        optioons: barChartOptions
                    })

                }
            });
        })
    </script>