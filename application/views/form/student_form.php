
<?php  function set_val_spin($data_struct,$id)
	{
		echo ($data_struct->spinner[$id]);
  } 
  ?>
<div class="container-fuild"> 

<h2 class='text-center'><?=$own_info->ef_name?></h2>
<div class="row">
    <div class="col-sm-4">
     
    </div>
    <div class="col-sm-4">
     <div class="panel panel-default">
    <div class="panel-heading text-center"><b>Họ và tên : <?=$own_info->first_name.' '.$own_info->last_name?> - ID : <?=$own_info->username ?></b></div>
    <div class="panel-body text-center">Lớp: <?=$own_info->class_name?></div>
  </div>
    </div>
    
  </div>

<form action="" method = "post">   
<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />  
<input type="hidden" name="form_id" value="<?=$form_id?>" />  
  <div class="table-responsive">          
  <table class="table table-bordered" >
    <thead>
      <tr>
        <th style="width: 85%">Nội dung đánh giá</th>
        <th style="width: 15%" >Cho điểm</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2" ><b>1 . Ý thức học tập</b></td>
        
      </tr>
      <tr>
        <td>1.1. Điểm chuẩn</td>
        <td>+30</td>
      </tr>
      <tr>
        <td>1.2. Trừ điểm</td>
        <td></td>
      </tr>
      <tr>
        <td>-Học lực yếu: -3</td>
        <td class = "text-center">- <input type="text" name = 'spinner[]' class="spinner m1" id="spinner_1" value = "<?php set_val_spin($data_struct,0);?>" /></td>
      </tr>
      <tr>
        <td>- Bị cảnh cáo học vụ: -5</td>
        <td class = "text-center">- <input type="text" name = 'spinner[]' class="spinner m1" id="spinner_2" value = "<?php set_val_spin($data_struct,1);?>" /></td>
      </tr>
      <tr>
        <td>- Đăng kí tín chỉ không đúng quy định -5</td>
        <td class = "text-center">- <input type="text" name = 'spinner[]' class="spinner m1" id="spinner_3" value = "<?php set_val_spin($data_struct,2);?>" /></td>
      </tr>
      <tr>
        <td>- Bị cấm thi hoặc bỏ thi cuối kỳ không có lý do: - 2đ/lần</td>
        <td class = "text-center">- <input type="text" name = 'spinner[]' class="spinner m1" id="spinner_4" value = "<?php set_val_spin($data_struct,3);?>" /></td>
      </tr>
      <tr>
        <td class="text-right"><b>Cộng</b></td>
        <td class = "text-center " ><span id="m_sum1">30</span></td>
      </tr>
      <tr>
        <td>Kỉ luật thi</td>
        <td>

        <div class="checkbox">
            <label><input type="checkbox" name = "cb1[]" value="4" class="cb1">Đình chỉ</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name = "cb1[]" value="2" class="cb1">Cảnh cáo</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name = "cb1[]" value="1" class="cb1">Khiển trách</label>
        </div>
        </td>
      </tr>
      <tr>
        <td class = "text-right"><b>Điểm kết luận của 1. [0, 30]</b></td>
        <td><span id="sum_1" class="sum">30</span></td>
      </tr>
      <tr>
        <td colspan="2"><b>2. Ý thức và kết quả chấp hành nội quy, quy chế</b></td>
      </tr>
      <tr>
        <td>2.1. Điểm chuẩn </td>
        <td>+25</td>
      </tr>
      <tr>
        <td>2.2. Trừ điểm</td>
        <td></td>
      </tr>
      <tr>
        <td>- Nộp hoặc nhưng không đúng một khoản kinh phí: -5đ/lần </td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_5" value = "<?php set_val_spin($data_struct,4);?>" /></td>
      </tr>
      <tr>
        <td>- Đăng ký học quá hạn (nếu được chấp nh n): -2đ </td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_6" value = "<?php set_val_spin($data_struct,5);?>" /></td>
      </tr>
      <tr>
        <td>- Không thực hiện theo Giấy triệu t p/Yêu cầu của Nhà trường: -5đ/lần </td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_7" value = "<?php set_val_spin($data_struct,6);?>" /></td>
      </tr>
      <tr>
        <td>- Trả quá hạn giấy tờ/h s đã được phep mượn: -5đ/lần </td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_8" value = "<?php set_val_spin($data_struct,7);?>" /></td>
      </tr>
      <tr>
        <td>- Không tham gia Bảo hiểm tế: -5đ</td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_9" value = "<?php set_val_spin($data_struct,8);?>" /></td>
      </tr>
      <tr>
        <td>- Vi phạm quy định noi cư trú: -10đ/lần </td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m2" id="spinner_10" value = "<?php set_val_spin($data_struct,9);?>" /></td>
      </tr>
      <tr>
        <td class = "text-right"><b>Cộng</b> </td>
        <td><span id="m_sum2">25</span></td>
      </tr>
      <tr>
        <td>Có quyết định kỉ luật (Cảnh cáo, Khiển trách, Phê bình)
Bị Cảnh cáo/Khiển trách/Phê bình thì trừ 100% (toàn bộ)/50% (một nửa)/25% (một
phần tư) tổng số điểm của Nội dung 2
</td>
        <td>
          <div class="checkbox">
              <label><input type="checkbox" name = "cb2[]" value="4" class="cb2">Cảnh cáo</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name = "cb2[]" value="2" class="cb2">Khiển trách</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name = "cb2[]" value="1" class="cb2">Phê bình</label>
          </div>
        
        </td>
      </tr>
      <tr>
        <td class = "text-right"><b>Điểm kết luận của 2. [0, 25]</b></td>
        <td><span class="sum" id="sum_2">25</span></td>
      </tr>
      <tr>
        <td colspan = "2"><b>3. Ý thức và kết quả tham gia hoạt động chính trị - xã hội, văn hoá, văn nghệ,
thể thao, phòng chống các tệ nạn xã hội</b></td>
      </tr>
      <tr>
        <td>3.1. Điểm chuẩn</td>
        <td>0</td>
      </tr>
      <tr>
        <td>3.2. Cộng điểm</td>
        <td></td>
      </tr>
      <tr>
        <td>- Tham gia đầy đủ các hoạt động của chi đoàn và tham gia đầy đủ các buổi sinh hoạt
chính trị theo triệu tap (nếu có) của Nhà trường (+10đ) </td>
        <td>+ <input type="text" name = 'spinner[]' class="spinner m3" id="spinner_11" value = "<?php set_val_spin($data_struct,10);?>" /></td>
      </tr>
      <tr>
        <td>- Tham gia (có giấy xác nh n) các hoạt động văn nghệ, thể thao, câu lạc bộ, hoạt
động tình nguyện….(+2đ/lần)
</td>
        <td>+ <input type="text" name = 'spinner[]' class="spinner m3" id="spinner_12" value = "<?php set_val_spin($data_struct,11);?>" /></td>
      </tr>
      <tr>
        <td>3.3. Trừ điểm</td>
        <td></td>
      </tr>
      <tr>
        <td>- Không tham gia Sinh hoạt chính trị theo Quy định (-2đ/buổi)</td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m_3" id="spinner_13" value = "<?php set_val_spin($data_struct,12);?>" /></td>
      </tr>
      <tr>
        <td class = "text-right"><b>Điểm kết luận của 3. [0, 20]</b></td>
        <td><b><span class="sum" id="sum_3">0</span></b></td>
      </tr>
      <tr>
        <td colspan="2"><b>4. Về phẩm chất công dân và quan hệ với cộng đồng</b></td>
      </tr>
      <tr>
        <td>4.1. Điểm chuẩn</td>
        <td>+15</td>
      </tr>
      <tr>
        <td>4.2. Trừ điểm</td>
        <td></td>
      </tr>

      <tr>
        <td>- Có Thông báo bằng văn bản về việc không chấp hành các chủ trư ng của Đảng,
    chính sách pháp lu t của Nhà nước, vi phạm an ninh chính trị, tr t tự an toàn xã hội,
    an toàn giao thông, (-5đ/lần)</td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m_4" id="spinner_14" value = "<?php set_val_spin($data_struct,13);?>" /></td>
      </tr>
 
      <tr>
        <td>- Không có tinh thần giúp đỡ bạn bè, không thể hiện tinh thần đoàn kết t p thể
(-5đ/lần)</td>
        <td>- <input type="text" name = 'spinner[]' class="spinner m_4" id="spinner_15" value = "<?php set_val_spin($data_struct,14);?>" /></td>
      </tr>
      
      <tr>
      <td class = "text-right"><b>Điểm kết luận của 4. [0, 15]</b></td>
      <td><b><span class="sum" id="sum_4">15</span></b></td>
      </tr>
      
      <tr>
      <td colspan="2"><b>5. Ý thức và kết quả tham gia công tác phụ trách l p, các đoàn thể, tổ chức
trong nhà trường hoặc đạt được thành tích đặc biệt trong học tập, rèn luyện
của học sinh, sinh viên</b></td>
      </tr>
      
      <tr>
      <td>5.1. Điểm chuẩn </td>
      <td>0</td>
      </tr>
      
      <tr>
      <td>5.2. Cộng điểm</td>
      <td></td>
      </tr>
     
      <tr>
      <td>- Giữ các chức vụ trong các tổ chức chính quyền, đoàn thể và được đánh giá hoàn
thành tốt nhiệm vụ (+10đ)
</td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_16" value = "<?php set_val_spin($data_struct,15);?>" /></td>
      </tr>
      
      <tr>
      <td>- Học lực (Xuất sắc, Giỏi): (+10đ)</td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_17" value = "<?php set_val_spin($data_struct,16);?>" /></td>
      </tr>
     
      <tr>
      <td>- Tham gia các cuộc thi chuyên môn như Procon, Olympic,…: (+5đ/lần)</td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_18" value = "<?php set_val_spin($data_struct,17);?>" /></td>
      </tr>
      
      <tr>
      <td>- Đạt giải tại các cuộc thi chuyên môn: (+5đ/lần) </td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_19" value = "<?php set_val_spin($data_struct,18);?>" /></td>
      </tr>
      
      <tr>
      <td>- Tham gia NCKH (không phải là SV NVCL): +5đ, </td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_20" value = "<?php set_val_spin($data_struct,19);?>" /></td>
      </tr>
      
      <tr>
      <td>-  Đạt giải NCKH các cấp hoặc có báo cáo tại Hội nghị NCKH/bài báo đăng trên
các tạp chí trong và ngoài nước: +5đ.</td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_21" value = "<?php set_val_spin($data_struct,20);?>" /></td>
      </tr>
      
      <tr>
      <td>- Được kết nạp Đảng: +10đ</td>
      <td>+ <input type="text" name = 'spinner[]' class="spinner m5" id="spinner_22" value = "<?php set_val_spin($data_struct,21);?>" /></td>
      </tr>

      
      <tr>
      <td class = "text-right"><b>Điểm kết luận của 5. [0, 10]</b></td>
      <td><b><span class="sum" id="sum_5">0</span></b></td>
      </tr>
      
      <tr>
      <td class = "text-right"><b>Tổng cộng (1.+2.+3.+4.+5.) [0, 100]</b></td>
      <td><b><span id="sum">70</span></b></td>
      </tr>
        
      <tr>
      <td class = "text-right"><b>Xếp loại</b></td>
      <td><b><span id="xl">Khá</span></b></td>
      </tr>
      
    </tbody>
  </table>
  
  </div>

  <div class="row mb text-center">
  <input type="number" name="sum" hidden value="70" id="ip_sum">
  <button type="submit" class="btn btn-default" <?php if($data_pre->efst_status >=2) echo "disabled" ?>>Submit</button>
  
  </div>
  <br>
  <br>
  <br>
</form>
<div class="form-group"> 
        
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />  
            <input type="hidden" name="form_id" value="<?=$form_id?>" />
            <hr>
            <h3><i>Nhận xét của lớp trưởng</i><?php if($data_pre->efst_status >=1) echo " (Lớp trưởng đã xem)" ?></h3>  
            <textarea name="pre_cmt" id="editor" class="required" readonly>
                <?=$data_pre->efst_comment;?>


            </textarea>
            <div class="checkbox text-center">
                <label><input type="checkbox" name="pre_accept"
                <?php 
                    if ($data_pre->efst_status >= 2) {
                        echo "checked";
                    }
                ?> 
                disabled value="2">Xác nhận</label><br>
               
            </div>
            <hr>
            <h3><i>Nhận xét của lớp cố vấn</i><?php if($data_pre->efst_status >=3) echo " (Cố vấn đã xem) " ?></h3>  
            <textarea name="adv_cmt" id="editor_adv" class="required" readonly>
                <?=$data_pre->efst_comment_2;?>
                     

            </textarea>
            <div class="checkbox text-center">
                <label><input type="checkbox" name="pre_accept"
                <?php 
                    if ($data_pre->efst_status == 4) {
                        echo "checked";
                    }
                ?> 
               disabled value="2">Xác nhận</label><br>
               
            </div>  
        </div>

</div>
<br><br>