$(document).ready(function(){
	span2
	$('#li1').click(function(){
		$('#welcome').hide();
		$('#Trans_money').hide();
		$('#close_account').hide();
		$('#Loan_deposit').hide();
		$('#cust_report').hide();
		$('#span2').text('');
		$('#Loan_apps').show(2000);
	});
	$('#li2').click(function(){
		$('#welcome').hide();
		$('#Loan_apps').hide();
		$('#Trans_money').hide();
		$('#close_account').hide();
		$('#cust_report').hide();
		$('#span2').text('');
		$('#Loan_deposit').show(2000);
	});
	$('#li3').click(function(){
		$('#welcome').hide();
		$('#Loan_apps').hide();
		$('#Trans_money').hide();
		$('#Loan_deposit').hide();
		$('#cust_report').hide();
		$('#span2').text('');
		$('#close_account').show(2000);
	});
	$('#li4').click(function(){
		$('#welcome').hide();
		$('#Loan_apps').hide();
		$('#close_account').hide();
		$('#Loan_deposit').hide();
		$('#cust_report').hide();
		$('#span2').text('');
		$('#Trans_money').show(2000);
	});
	
	$('#li5').click(function(){
		
		$('#welcome').hide();
		$('#Loan_apps').hide();
		$('#close_account').hide();
		$('#Loan_deposit').hide();
		$('#Trans_money').hide();
		$('#cust_report').show(2000);
	});
	$('#loan_apply_btn').click(function(){
	    name  = $('#name').val();
        accno = $('#accno').val();
        branch= $('#branch_name').val();		
        loant= $('#loan_a').val();		
        ldate = $('#Loanstartdate').val();		
        lamount= $('#loanamount').val();		
        rate  = $('#rate').val();		
        emi   = $('#emi').val();		
        itramnt= $('#interestamount').val();
        total = $('#totalamount').val(); 
		 $.post('menudata.php',{name:name,accno:accno,branch:branch,loant:loant,ldate:ldate,lamount:lamount,rate:rate,emi:emi,itramnt:itramnt,total:total},function(data){
			alert(data);
		}); 
	});
	
	$('#pay_btn').click(function(){
		account = $('#accno_d').val();
		l_type  = $('#loan_t').val();
		emi_amount = $('#emi_d').val();
		date    = $('#Loanstartdate_d').val();
		$.post('menudata.php',{account:account,l_type:l_type,emi_amount:emi_amount,date:date},function(data){
			alert(data);
		});
	});
	
	$('#Close').click(function(){
		cust_name = $('#cust_name').val();
		cust_accno= $('#cust_accno').val();
		branch_code=$('#branch_code').val();
		acctype   = $('#acctype').val();
		
		$.post('menudata.php',{name:cust_name,accno:cust_accno,acctype:acctype,branch_code:branch_code},function(data){
			alert(data);
		});
	});
	
	
	$('#deposit_btn').click(function(){
		var source_acc = $('#src_acc_no').val();
		var cust_name  = $('#custname').val();
		var dest_acc   = $('#dest_acc_no').val();
		var Amount     = $('#Amount').val();
		var operation  = $('#tras_type').val();
		
		$.post('menudata.php',{source_acc:source_acc,cust_name:cust_name,dest_acc:dest_acc,amount:Amount,operation:operation},function(data){
			alert(data);
		});
	});
	
	$('#cust_search').click(function(){
		cust_id = $('#search_id').val();
		$.post('menudata.php',{cust_id:cust_id},function(data){
			$('#span2').html(data);
		});
	});
});
function clearOf(){
		 source_acc = '';
		 cust_name  = '';
		 dest_acc   = '';
		 Amount     = '';
		 operation  = '';
		 cust_name  = '';
		 cust_accno = '';
		 branch_code= '';
		 acctype    = '';
		 account    = '';
		 l_type     = '';
		 emi_amount = '';
		 date       = '';
		 name  = '';
         accno = '';
         branch= '';		
         loant= '';	
         ldate = '';
         lamount= '';		
        rate  = '';		
        emi   = '';		
        itramnt= '';
        total = '';
		$('#span2').text('');
	}
	