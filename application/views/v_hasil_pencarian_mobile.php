<?php echo "<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.2//EN' 
  'http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd'>" ?>
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>LOGIN BNCC LAUNCHING</title><style type="text/css">
/*<![CDATA[*/.abt{border-top:1px solid}
.abb{border-bottom:1px solid}
.acw{border-color:#e9e9e9}
.acb{border-color:#1d4088}
.acnb{border-color:#4f69a0}
.aclb{border-color:#d8dfea}
.acg{border-color:#ccc}
.acy{border-color:#e2c822}
.acr{border-color:#dd3c10}
.acw{background-color:#fff}
.acbk{background-color:#000}
.acb{background-color:#453afe}/*ganti warna header*/
.aclb{background-color:#eceff5}
.acnb{background-color:#5875b2}
.acg{background-color:#f2f2f2}
.acy{background-color:#fffbe2}
.acr{background-color:#ffebe8}
.aps{padding:2px 3px}
.apm{padding:4px 3px}
.apl{padding:6px 3px}
form{margin:0;border:0}
.input{border:solid 1px #999;border-top-color:#888;margin:0;padding:3px}
.fcb{color:#000}
.fcg{color:#808080}
.fcw{color:#fff}
.fcl{color:#453afe}
.fcs{color:#6d84b4}
.mfsxs{font-size:x-small}
.mfss{font-size:small}
body, tr, input, textarea, .mfsm{font-size:medium}
.mfsl{font-size:large}
.btn{background:#e4e4e3;border:solid 2px;border-color:#aaa #999 #888;margin:0;color:#333}
.btnC{background:#453afe;/*ganti warna box*/border-color:#8a9ac5 #29447E #1a356e;color:#fff}
.btnS{background:#69a74e;border-color:#98c37d #3b6e22 #2c5115;color:#fff}
.btnN{background:#ee3f10;border-color:#f48365 #8d290e #762610;color:#fff}
.btnF{display:inline}
.touch .btn.btnHL{min-width:45px;padding:4px 12px 4px}
.touch .btn.btnHL .img{margin:0}
.touch .btn.btnHL input{display:none}
label.btn input{background:none;border:none;margin:0;color:#333}
label.btnC input,
label.btnS input,
label.btnN input{color:#fff}
small{color:#555}
.marquee{padding-bottom:1px}
.marquee a{padding:2px 4px 2px}
.marquee_tab_select{color:#fff;background-color:#6d84b4}
#title, .section_title{font-weight:bold;color:#111}
.inline_button{vertical-align:top;margin-left:5px}
.note{background-color:#f7f7f7;border-top:1px solid #453afe;border-bottom:1px solid #ccc}
.likethumbicon{margin-right:3px;vertical-align:baseline}
.page-nav .selected{font-weight:bold}
ul{margin:0;padding-left:20px}
.lr{width:100%}
.lr .r{text-align:right}
img{border:0;vertical-align:top}
body{margin:0;padding:0}
body, tr, input, textarea{font-family:sans-serif}
a:link, a:visited{color:#453afe;text-decoration:none}
#root a.sub:link, #root a.sub:visited{color:#808080}
#root a.sec:link, #root a.sec:visited{color:#6d84b4}
#root a.inv:link, #root a.inv:visited{color:#fff}
#root a.sub:focus, #root a.sub:hover,
#root a.sec:focus, #root a.sec:hover{color:#fff}
#root a.inv:focus, #root a.inv:hover{color:#453afe;background-color:#fff}
a:focus, a:hover{color:#fff;background-color:#453afe}
/*]]>*/#viewport #root .contents #fb_header .lr tr td .header_logo {
	color: #FFF;
}
.contents #fb_header .lr tr td .header_logo {
	color: #FFF;
}
</style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' harus diisi.\n'; }
    } if (errors) alert('\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>
<body>
<div class="contents"><noscript><meta http-equiv="X-Frame-Options" content="deny" /></noscript>
<div class="mPageHeader acb aps" id="fb_header"><table cellspacing="0" cellpadding="0" class="lr"><tr><td valign="top">
<div class="header_logo">BNCC LAUNCHING 2012</div></td><td valign="top" class="r"></td></tr></table></div>
<div class="acw apm" id="title">HASIL PENCARIAN </div>
<table border="1">
	<tr>
    	<th>No.Tiket</th>
        <th>Nama</th>
        <th>No.HP</th>
        <th>Edit</th>
    </tr>
    
    <?php if($hasil==false): ?>
    <tr>
    	<td colspan="9">Data tidak ditemukan</td>
    </tr>
    <?php else : ?>
	<?php foreach($hasil as $data): ?><!-- cetak dari database-->
	<tr>
    	<td>BL-<?php echo $data->ID?></td>
   		<td><?php echo $data->Nama?></td>
    	<td><?php echo $data->NoHP?></td>
        <td>
       		<a href="<?php echo base_url().'mobile/edit/'.$data->ID;?>">edit <!-- untuk link ke fungsi edit di c_bl passing ID--> 
              
        </td>
    </tr>    
	<?php endforeach;endif;?>
    <br/>
</table>
</form>
</div>
<div class="acw apm"></div></div></div></div></div></div><div id="static_templates">
<div id="static_templates_merge">
<a href="<?php echo base_url().'mobile/search';?>">Refresh</a><br />
<a href="<?php echo base_url().'mobile/registrasi';?>">Back</a>
<br />

</div></div>
</body>
</html>