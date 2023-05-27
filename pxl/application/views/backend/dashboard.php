<style type="text/css">
    #total_chart {
    font-family: arial;
    width: 100%;
}
</style>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="card-group">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-users"></i></h3>
                                <p class="text-muted">Users</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary"><?php echo $this->db->query("SELECT * FROM users")->num_rows(); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
      
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-diamond"></i></h3>
                                <p class="text-muted">Coaches</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-purple"><?php echo $this->db->query("SELECT * FROM stores")->num_rows(); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
         
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-bag"></i></h3>
                                <p class="text-muted">Orders</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success"><?php 
                                    echo $this->db->query("SELECT * FROM orders")->num_rows();
                                ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="card-group">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-money"></i></h3>
                                <p class="text-muted">Total Subscriptions</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">
                                    <?php echo $this->db->query("SELECT * FROM users WHERE (package_id != 0 && package_id != 1)")->num_rows(); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
      
        <!-- Column -->
        
         
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="fa fa-money"></i></h3>
                                <p class="text-muted">Orders Earning</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success">
                                    $<?php echo $this->db->query("SELECT SUM(price) AS TAMOUNT FROM orders")->result_object()[0]->TAMOUNT; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


<div class="row" style="margin-top: 0px;margin-bottom: 100px;">
    <div class="col-md-12">
        <div id="total_chart"></div>
    </div>
</div>
</div>



<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script type="text/javascript">
Highcharts.getJSON('<?php echo base_url();?>admin/dashboard/get_sales_data', data => {
    const chart = Highcharts.stockChart('total_chart', {
        chart: {
            height: 500
        },

        title: {
            text: 'Daily Orders'
        },

        subtitle: {
            text: 'Overall Order Report'
        },

        rangeSelector: {
            selected: 1
        },

        series: [{
            name: 'Total Orders',
            data: data,
            type: 'area',
            threshold: null,
            tooltip: {
                valueDecimals: 0
            }
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    chart: {
                        height: 300
                    },
                    subtitle: {
                        text: null
                    },
                    navigator: {
                        enabled: false
                    }
                }
            }]
        }
    });

    document.getElementById('small').addEventListener('click', () => {
        chart.setSize(400);
    });

    document.getElementById('large').addEventListener('click', () => {
        chart.setSize(800);
    });

    document.getElementById('auto').addEventListener('click', () => {
        chart.setSize(null);
    });
});
</script>
