
<div class="container">
  
  <h3><p class = "text-center">Các đánh gía rèn luyện đang có</p></h3>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tên</th>
        <th>Chú thích</th>
        <th>Tình trạng</th>
        <th>Hành động</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($list_form as $key => $value) { ?>
        <tr>
            <td><?php echo $value['ef_name']; ?></td>
            <td><?php echo $value['ef_description']; ?></td>
            <td><?php 
                if ($value['status'] == -1) {
                    echo "Chưa đánh giá";
                } elseif ($value['status'] == 0) {
                    echo "Đã đánh giá";
                } elseif ($value['status'] == 1) {
                    echo "Lớp trưởng đã xem";
                
                } elseif ($value['status'] == 2) {
                    echo "Đã gửi lên cố vấn";
                } elseif ($value['status'] == 3) {
                    echo "Cố vấn đã xem";
                } elseif ($value['status'] == 4) {
                    echo "Đã gửi lên khoa";
                }
            
            ?></td>
            <td><?php
                if ($value['status'] == -1) {
                    echo "<a href='evaluation/index/{$value['ef_id']}'>Vào đánh giá</a>";
                } elseif ($value['status'] == 0) {
                    echo "<a href='evaluation/index/{$value['ef_id']}'>Sửa đánh giá</a>";
                } elseif ($value['status'] == 1) {
                    echo "<a href='evaluation/index/{$value['ef_id']}'>Sửa đánh giá</a>";
                }else {
                    echo "<a href='evaluation/index/{$value['ef_id']}'>Sửa đánh giá</a>";
                }
            ?></td>
            <td>
                <a href='manager/pre/<?=$value['ef_id'];?>'>Vào quản lý</a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

