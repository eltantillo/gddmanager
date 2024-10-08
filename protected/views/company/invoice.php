<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$company; ?> <small><?php echo Language::$payment; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL . '/';?>"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/company';?>"><?php echo $model->name; ?></a></li>
    <li class="active"><?php echo Language::$payment; ?></li>
  </ol>
</section>

<div id="content">
<section class="content">
  <div class="invoice" id="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> GDDManager
          <small class="pull-right"><?php echo Language::$gddeasy; ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row">
      <div class="col-sm-4 invoice-col">
        <?php echo Language::$from; ?>
        <address>
          <strong>GDDManager</strong><br>
          Elisa Griensen #2504, Revolucion Mexicana<br>
          Cd. Juárez, Chihuahua México 32670<br>
          <strong><?php echo Language::$phone; ?>:</strong> +52 (656) 809-7581<br>
          <strong><?php echo Language::$email; ?>:</strong> info@gddmanager.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <?php echo Language::$to; ?>
        <address>
          <strong><?php echo $company->name; ?></strong><br>
          <?php echo $company->address1; ?>, <?php echo $company->address2; ?><br>
          <?php echo $company->city; ?>, <?php echo $company->state; ?> <?php echo $company->country; ?> <?php echo $company->zip; ?><br>
          <strong><?php echo Language::$phone; ?>:</strong> <?php echo $company->phone; ?><br>
          <strong><?php echo Language::$email; ?>:</strong> <?php echo $company->email; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <strong><?php echo Language::$paymentDue; ?>:</strong> <?php echo date('Y-m-d', strtotime($company->membership)); ?><br>
        <strong><?php echo Language::$account; ?>:</strong> gddm-<?php echo $model->id; ?><br>
        <!--strong><?php echo Language::$invoice; ?> #007612</strong--><br>
        <br>
        <br><!--strong>Order ID:</strong> 4F3S8J<br-->
        <br>
        <br>
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <hr/>
      <div class="col-xs-4 invoice-col">
        <strong><?php echo Language::$invoiceDate; ?>:</strong><br>
        <?php echo date('Y-m-d', strtotime($company->membership)); ?>
      </div>
      <div class="col-xs-4 invoice-col">
        <strong><?php echo Language::$expirationDate; ?>:</strong><br>
        <?php echo date('Y-m-d', strtotime("+15 days", strtotime($company->membership))); ?>
      </div>
      <div class="col-xs-4 invoice-col">
        <strong><?php echo Language::$currency; ?>:</strong><br>
        <?php echo Language::$currencies['usd']; ?>
      </div>
    </div>
    <!-- Table row -->
    <div class="row">
      <hr/>
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th><?php echo Language::$qty; ?></th>
            <th><?php echo Language::$product; ?></th>
            <th><?php echo Language::$description; ?></th>
            <th><?php echo Language::$unitPrice; ?></th>
            <th><?php echo Language::$subtotal; ?></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo $company->month_users; ?></td>
            <td>User license</td>
            <td>Standard user licence</td>
            <td><?php echo money_format('%.2n', $cost); ?></td>
            <td><?php echo money_format('%.2n', $company->month_users * $cost); ?></td>
          </tr>
          
          <tr class="borderless">
            <td class="borderless"></td>
            <td class="borderless"></td>
            <td class="borderless"></td>
            <th class="text-right"><?php echo Language::$subtotal; ?>: </th>
            <td><?php echo money_format('%.2n', $company->month_users * $cost); ?></td>
          </tr>
          <tr class="borderless">
            <td class="borderless"></td>
            <td class="borderless"></td>
            <td class="borderless"></td>
            <td class="text-right"><?php echo Language::$tax; ?> (16%): </td>
            <td><?php echo money_format('%.2n', $company->month_users * $cost * 0.16); ?></td>
          </tr>
          <tr class="borderless">
            <td class="borderless"></td>
            <td class="borderless"></td>
            <td class="borderless"></td>
            <th class="text-right"><?php echo Language::$total; ?>: </th>
            <td><strong><?php echo money_format('%.2n', ($company->month_users * $cost) + ($company->month_users * $cost * 0.16)); ?></strong></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-12">
        <p class="lead"><?php echo Language::$paymentMethods; ?>:</p>
        <img src="<?php echo URL;?>/img/credit/visa.png" alt="Visa">
        <img src="<?php echo URL;?>/img/credit/mastercard.png" alt="Mastercard">
        <img src="<?php echo URL;?>/img/credit/american-express.png" alt="American Express">
        <img src="<?php echo URL;?>/img/credit/paypal.png" alt="Paypal">
        <!--img src="<?php echo URL;?>/img/credit/skrill.png" alt="Skrill"-->

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"><?php echo Language::$paymentMethodsDesc; ?></p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row">
      <div class="col-xs-12">
        <a onclick="window.print();return false;" class="btn btn-success no-print"><i class="fa fa-print"></i> <?php echo Language::$print; ?></a>
        
        <?php if (date("Y-m-d H:i:s") > $company->membership){ ?>
          <a href="?type=paypal" class="btn btn-primary pull-right no-print">
            <i class="fa fa-credit-card"></i> <?php echo Language::$payWith; ?> PayPal
          </a>
          <!--button type="button" class="btn btn-skrill pull-right no-print" style="margin-right: 5px;">
            <i class="fa fa-credit-card"></i> <?php echo Language::$payWith; ?> Skrill
          </button-->
        <?php }else{ ?>
          <div class="paid">
            <img src="<?php echo URL;?>/img/paid.png" alt="Paid">
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
</div>