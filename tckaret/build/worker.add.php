<script type="text/javascript">
	$(function(){
		$("form")[0].reset();

		$("#listpegawai").on('change',function(){
			$("#idpegawai").val($(this).val());
		})

		$("#initial").on('keyup',function(){
			this.value = this.value.toUpperCase();

			$.ajax({
                async:false,
                url: hostname + "/api/worker/check.available.initial.php",
                type: "POST",
                data: {
                    initial:$(this).val()
                },
                success: function(resp){
                    //console.log(resp);
                    $("#error-initial").html(resp);
                    disabledButton(resp);
                }
            });
		});

		$("#kode").on('keyup',function(){

			$.ajax({
                async:false,
                url: hostname + "/api/worker/check.available.code.php",
                type: "POST",
                data: {
                   kode:$(this).val()
                },
                success: function(resp){
                    //console.log(resp);
                    $("#error-kode").html(resp);
                    disabledButton(resp);
                }
            });
		});

		/*$("#initial").val(function(){
			return this.value.toUpperCase();
		});*/

		$("#btnSimpan").click(function(){
			var kode = $("#kode").val();
			var name = $("#name").val();
			var initial = $("#initial").val();
			var status = $("#status").val();
			var description = $("#description").val();

			//alert(initial + " " + pegawai + " " + status + " " + description);

			if(kode != "" && name != "" && initial != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-worker",
						kode:kode,
						name:name,
						initial:initial,
						status:status,
						description:description
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Worker has been added!");
                            location.href = hostname + "/worker?last="+data['id'];
                        }
                        else{
                            alert("Worker cant be added!");
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})

	function disabledButton(resp){
		if (resp == ""){
			$("#btnSimpan").attr("disabled",false);
		} else {
			$("#btnSimpan").attr("disabled",true);
		}
	}


</script>