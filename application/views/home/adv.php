
<div class="container">
  
  <h3><p class = "text-center">Các đánh gía rèn luyện đang có</p></h3>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tên</th>
        <th>Chú thích</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($list_form as $key => $value) { ?>
        <tr>
            <td><?php echo $value['ef_name']; ?></td>
            <td><?php echo $value['ef_description']; ?></td>
            <td>
                <a href='manager/adv/<?=$value['ef_id'];?>'>Vào quản lý</a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

