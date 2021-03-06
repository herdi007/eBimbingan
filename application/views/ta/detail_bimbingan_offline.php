<?php

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bimbingan Offline
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li>Aktivitas</li>
        <li><a href="#">Bimbingan Offline</a></li>
        <li><strong>Detail</strong></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$this->session->npm.' - '.$this->session->nama_mhs?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
<!-- Content Here -->


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?=$bimbinganOffline[0]['topik']?> <small> <span class="time pull-right"><i class="fa fa-clock-o"></i> <?=time_elapsed_string( date('Y:m:d H:i:s', strtotime($bimbinganOffline[0]['tgl_input'])) )?></span></small></h3>
  </div>
  <div class="panel-body">
    <?=$bimbinganOffline[0]['pembahasan']?>
  </div>
</div>
<a href="<?=base_url()?>ta/bimbingan_offline" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
<!-- End of content -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
