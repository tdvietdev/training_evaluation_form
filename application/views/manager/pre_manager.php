<div class="container-fuild"> 
<h3 class="text-center">Quản lý đánh giá rèn luyện lớp <?=$class_info->class_name ?></h3>
  <form action="" method="post">

  <div class="table-responsive">          
  <table class="table table-bordered" >
  <thead>
      <tr>
        <th>MSV</th>
        <th>Họ và tên</th>
        <th>Tổng điểm</th>
        <th>Trạng thái</th>
        <th>Xem</th>
        <th>Chọn gửi lên cố vấn</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach ($list_std as $std): ?>

        <tr bgcolor="<?php echo ($std['status'] <= 0 ? '#FAAC58' : '#BCF5A9' ); ?>">
            <td><?=$std['username'] ?></td>
            <td><?=$std['first_name'].' '.$std['last_name'] ?></td>
            <td><?php echo (( $std['sum'] != -1 ) ?$std['sum']: 'NULL'); ?></td>
            <td><?php 
              if ($std['status'] == 0) {
                echo "Đã điền form";
              } elseif ($std['status'] == 1) {
                echo "Lớp trưởng đã xem";
              
              }elseif ($std['status'] == -1) {
                echo "Chưa làm đơn";
              
              } elseif ($std['status'] == 2) {
                echo "Đã gửi lên cố vấn";
              }elseif ($std['status'] == 3) {
                echo "Cố vấn đã xem";
              
              } else{
                echo "Đã gửi lên khoa";
              }
            ?></td>

              <td><?php if($std['status'] != -1){?>
                <a href="evaluation/class_pre/<?=$form_id?>/<?=$std['user_id']?>">Xem</a>
            <?php } ?>
              </td>


            <td>
              <?php
                if ($std['status'] == 1) {
                  echo "<input type='checkbox' name='accept[]' value='{$std['efst_id']}'>";
                } 
                elseif ($std['status'] >= 2) {
                  echo "<input type='checkbox' disabled checked value='{$std['efst_id']}'>";
                } 
              ?>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
  </table>

  
  </div>
  <div class="row mb text-center">
  <input type="number" name="sum" hidden value="70" id="ip_sum">
  <button type="submit" class="btn btn-default" >Submit</button>
  </form>
  </div>
  </div>