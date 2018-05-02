<div class="container-fuild"> 

  <form action="" method="post">
  <h3 class="text-center">Quản lý đánh giá rèn luyện lớp <?=$class_info->class_name ?></h3>
  <div class="table-responsive">          
  <table class="table table-bordered" >
  <thead>
      <tr>
        <th>MSV</th>
        <th>Họ và tên</th>
        <th>Tổng điểm</th>
        <th>Trạng thái</th>
        <th>Xem</th>
        <th>Gửi lên khoa</th>
        <th>Yêu cầu làm lại</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach ($list_std as $std): ?>

        <tr bgcolor="<?php echo ($std['status'] < 2 ? '#FAAC58' : '#BCF5A9' ); ?>" >
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

              <td><?php if($std['status'] >= 2) { ?>
                <a href="evaluation/adv/<?=$form_id?>/<?=$std['user_id']?>">Xem</a>
              <?php } ?>
              </td>

            <td>
              <?php
                if ($std['status'] == 3) {
                  echo "<input type='checkbox' name='accept[]' value='{$std['efst_id']}'>";
                } 
                elseif ($std['status'] >= 4) {
                  echo "<input type='checkbox' disabled checked value='{$std['efst_id']}'>";
                } 
              ?>
            </td>
            <td><?php
                if ($std['status'] == 3) {
                  echo "<input type='checkbox' name='rewrite[]' value='{$std['efst_id']}'>";
                } 
                 
              ?></td>
        </tr>

    <?php endforeach; ?>

    </tbody>
  </table>

  
  </div>
  <div class="row mb text-center">
  <input type="number" name="sum" hidden value="70" id="ip_sum">
  <button type="submit" class="btn btn-success" name="submit" value="submit" >Gửi lên khoa</button>
  <button type="submit" class="btn btn-warning" name="submit" value="rewrite" >Yêu cầu làm làm lại</button>
  </form>
  </div>
  </div>