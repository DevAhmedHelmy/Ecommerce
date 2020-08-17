@push('js')
    <script>
        $(document).ready(function(){
            $('#jstree').jstree({ 'core' : {
                'data' : {!! categories() !!}
            },
            "checkbox" : {
                "keep_selected_style" : true
              },
              "plugins" : [ "wholerow" ]
             });

        });
        $('#jstree').on('changed.jstree',function(e, data){
            var i , j,r  =[];
            var name = [];
            for(i=0,j=data.selected.length; i < j; i++)
            {
                r.push(data.instance.get_node(data.selected[i]).id);

            }


            $('.category_id').val(r.join(', '));



         });
    </script>
@endpush
<div class="tab-pane container fade" id="categories">
    <div id="jstree"></div>
    <input type="hidden" name="category_id" id="category_id" class="category_id">
</div>
