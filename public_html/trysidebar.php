


<div class="left-sidebar" style="overflow:auto;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" >
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" >
            <ul id="sidebarnav" class="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>

                <li class="nav-devider"></li>
                <!-- <li class="nav-label">Dashboard</li> -->
                <li> <a class="has-arrow" href="dashboard" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                    <!-- <ul aria-expanded="false" class="collapse">
                        <li> <a  href="dashboard">Dashboard</a></li>
                        <li> <a href="new_dashboard">Dashboard 2</a></li>
                    </ul> -->
                </li>
                <li class="nav-devider"></li>
                <li> <a class="has-arrow" href="report" aria-expanded="false"><i class="fa fa-shopping-bag"></i><span class="hide-menu">Report</span></a>

                </li>
                <li> <a class="has-arrow" href="openingclosingreport" aria-expanded="false"><i class="fa fa-shopping-bag"></i><span class="hide-menu">Opening Closing Report</span></a>

                </li>
                <li> <a class="has-arrow" href="customer" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Clients</span></a>

                </li>
                <li> <a class="has-arrow" href="vendor" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">Vendors</span></a>

                </li>
                <li class="nav-devider"></li>
                <li class="nav-label">Products</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu"> Items<span class="label label-rouded label-warning pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow" href="items">Standard Items</a></li>
                        <!--<li><a href="client_items">Client Items</a></li>-->
                         <li><a class="has-arrow" href="purchase_items">Purchase Items</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-label">Transaction</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Transaction<span class="label label-rouded label-warning pull-right">3</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow" href="invoices">Invoice</a></li>
                        <!-- <li><a href="quotation">QUOTATION</a></li> -->
                        <!-- <li><a href="deliverynote">DELIVERY NOTE</a></li> -->
                        <!-- <li><a href="creditnote">CREDIT NOTE</a></li> -->
                        <li><a class="has-arrow" href="purchase_order">Purchase Order</a></li>
                        <!-- <li><a href="workorder">WORK ORDER</a></li> -->
                        <li><a class="has-arrow" href="purchaseitem">Purchase Item</a></li>
                    </ul>
                </li>

                <li class="nav-devider"></li>
                <li class="nav-label">Expence</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Expence<span class="label label-rouded label-danger pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow" href="expences">Expences</a></li>
                        <li><a class="has-arrow" href="employee">Employees</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow" href="barcode" aria-expanded="false"><i class="fa fa-barcode"></i><span class="hide-menu">BarCode</span></a>

                </li>
                <!-- <li> <a class="has-arrow" href="package" aria-expanded="false"><i class="fa fa-repeat"></i><span class="hide-menu">Upgrade Now</span></a>

                </li> -->
                  <li class="nav-devider"></li>
                  <li class="nav-label">Settings</li>
                  <li>
                  <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings<span class="label label-rouded label-success pull-right">5</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow" href="load_company">Company Profile</a></li>
                        <li><a class="has-arrow" href="log">Account</a></li>
                        <li><a class="has-arrow" href="backup11">Backup</a></li>
                        <li><a class="has-arrow" href="import_db">Import</a></li>
                        <li><a class="has-arrow" href="preference">Preference</a></li>
                    </ul>
                </li>
                <!-- <li> <a class="has-arrow  " href="https://ewaybill1.nic.in/ewbnat2/" aria-expanded="false"><i class="fa fa-road"></i><span class="hide-menu">e-Way Bill</span></a>

                </li> -->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>

<script type="text/javascript">

  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  // var path = window.location.pathname;

  // Account for home page with empty path
  if ( path == '' ) {
    path = 'http://localhost/app/';
  }

  var target = $('#sidebarnav li a[href="'+path+'"]');

  // Add active class to target link
  target.addClass('has-arrow active');



</script>
