(function ($) {
    $(document).ready(function () {

        // SubDistrict get by district
        $('select[name="district_id"]').change(function(){
            let district_id = $(this).val();
            // alert(district_id);
            if(district_id){
                $.ajax({
                    url: '/get/subdistrict/frontend/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        $('select[name="subdistrict_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subdistrict_id"]').append(`
                            <option value='${value.id}'>${value.subdistrict_en} | ${value.subdistrict_ban}</option>
                            `);
                        });
                    }
                });
            }else {
                alert('danger');
            }

        })

    });
})(jQuery);
