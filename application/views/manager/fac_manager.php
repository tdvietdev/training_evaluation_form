<div class="container-fuild"> 
<h3 class="text-center">Quản lý đánh giá rèn luyện</h3>
<form action="" method="post">
<div class="form-group text-center">
  <h3><label for="sel1">Lớp</label></h3>
  <h3><select name="class">
    <option value='-1'>Chọn lớp</option>
    <?php foreach ($list_class as $std): ?>
    <option value='<?=$std['class_id']?>'
    <?php if ($std['class_id'] == $class_id) {
      echo ' selected ';
    } ?>
    
    ><?=$std['class_name']?></option>

    <?php endforeach;  ?>
  </select></h3>
  <button type="submit" class="btn btn-success" name="submit" value="submit" >Chọn</button>
</div>
</form>
  <div class="table-responsive">          
  <table class="table table-bordered" >
  <thead>
      <tr>
        <th>MSV</th>
        <th>Họ và tên</th>
        <th>Tổng điểm</th>
        <th>Trạng thái</th>
      
       
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

        </tr>

    <?php endforeach; ?>

    </tbody>
  </table>

  
  </div>
  <div class="row mb text-center">
  </form>
  </div>
  </div>