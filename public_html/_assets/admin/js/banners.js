let sortables = document.querySelectorAll('.js-sortable');
let save_order = document.getElementById('save-order-btn');
let base_url = document.getElementById('base_url').value;
let datetime_inputs = document.querySelectorAll('[type="datetime-local"]');

if(sortables) {
    sortables.forEach(function(el) {
        let sortable_list = Sortable.create(el, {
            animation: 150,
            ghostClass: 'blue-background-class',
            store: {
                set: function (sortable) {
                    let order = sortable.toArray();

                    let form_data = new FormData();
                    form_data.append('banners_order', order.join('|'));

                    fetch(`${base_url}/api/banners/save_order`, {
                        method: 'POST',
                        body: form_data
                    });
                    
                    /* if(banners_order_input) banners_order_input.value = order.join('|');
                    if(banners_order_form) banners_order_form.submit(); */
                }
            }
        });

        if(save_order) save_order.addEventListener('click', function() {
            sortable_list.save();
        })
    })
}