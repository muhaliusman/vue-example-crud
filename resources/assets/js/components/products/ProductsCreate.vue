<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'showPeople'}" class="btn btn-sm btn-default">Back</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Create new product</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="name">Product Name</label>
                            <input type="text" id="name" v-model="product.product_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="total">Product Total</label>
                            <input type="number" id="total" v-model="product.product_total" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="price">Product Price</label>
                            <input type="number" id="price" v-model="product.product_price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data: function () {
            return {
                product: {
                    person_id: this.$route.params.id,
                    product_name: '',
                    product_total: '',
                    product_price: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newProduct = app.product;
                axios.post('/api/v1/products', newProduct)
                    .then(function (resp) {
                        app.$router.push({path: '/people/'+ newProduct.person_id});
                    })
                    .catch(function (resp) {
                        alert("Could not create product");
                    });
            }
        }
    }
</script>