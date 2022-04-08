<div>
    @include('backstage.partials.tables.top')
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    @include('backstage.partials.tables.headers')

                    @include('backstage.partials.tables.body')
                </table>
            </div>
        </div>
    </div>
    @include('backstage.partials.tables.footer')

</div>

@push('js')
    <script>
        window.livewire.on('deleteResource', function(url, resource){
            swal({
                title: "Are you sure you want to delete this "+resource+"?",
                text: "The data will be permanently removed from our servers forever. This action cannot be undone!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No",
                        value: false,
                        visible: true,
                        closeModal: true,
                    },
                    confirm: {
                        className: 'swal-delete-button',
                        text: "Yes",
                        value: true,
                        visible: true,
                        closeModal: false,
                    },
                },
            }).then(doDelete => {
                if(doDelete) {
                    axios.post(url, { _method: 'delete' })
                        .then(function (response) {
                            swal({
                                title: "Success!",
                                text: "The "+resource+" has been removed.",
                                icon: "success",
                                buttons: false,
                                timer: 1000,
                            });
                            window.livewire.emit('resourceDeleted');
                        });
                }
            });
        });
    </script>
@endpush
