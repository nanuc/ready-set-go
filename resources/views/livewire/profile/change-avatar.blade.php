<div>
    <x-dropify :model="$user" type="avatar"/>
</div>

@push('scripts')
    <script>
        var drEvent = $('.user-images').dropify();

        $('body').off('change', '.user-images');
        $('body').on('change', '.user-images', function (event) {
            var type = $(event.target).data('type');
            upload($(this)[0].files[0], '/profile/avatar');
        })

        drEvent.on('dropify.beforeClear', function(event, element){
            axios.delete('/profile/avatar');
        });
    </script>
@endpush
