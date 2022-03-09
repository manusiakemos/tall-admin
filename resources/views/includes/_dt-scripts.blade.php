<script data-turbolinks-eval="false" data-turbo-eval="false">
    Livewire.on("confirmDestroy", (id) => {
        let n = new Noty({
            modal: true,
            layout: 'center',
            text: 'Do you want to continue?',
            buttons: [
                Noty.button('YES', 'btn bg-primary-500 text-white :hover mr-1', function () {
                    @this.destroy(id);
                    n.close();
                }),
                Noty.button('NO', 'btn bg-danger-500 text-white :hover mr-1 mx-1', function () {
                    n.close();
                })
            ]
        });
        n.show();
    });
    Livewire.on("refreshDt", (showNoty = false) => {
        Livewire.components.getComponentsByName('{{$table}}')[0].$wire.$refresh();
        if (showNoty) {
            new Noty(
                {
                    text: 'Refresh Datatable',
                    theme: 'relax',
                    type: 'warning',
                    timeout: 1500
                }
            ).show();
        }
    });
</script>
