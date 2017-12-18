<template>
    <div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Person Detail
                <div class="pull-right">
                    <router-link to="/" class="btn btn-sm btn-default">Back</router-link>
                </div>
            </div>
            <div class="panel-body">
                <table border="0">
                    <tr>
                        <td><b>Name</b></td>
                        <td> : </td>
                        <td> {{ person.people_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Address</b></td>
                        <td> : </td>
                        <td> {{ person.people_address }}</td>
                    </tr>
                    <tr>
                        <td><b>Phone Number</b></td>
                        <td> : </td>
                        <td> {{ person.people_phone_number }}</td>
                    </tr>
                </table>
                <br>
                <div class="form-group">
                    <router-link :to="{name: 'createProducts'}" class="btn btn-success btn-sm">Create Product</router-link>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Total</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product, index in person.products">
                            <td>{{ product.product_name }}</td>
                            <td>{{ product.product_total }}</td>
                            <td>{{ product.product_price }}</td>
                            <td>
                                <router-link :to="{name: 'editProducts', params: {product: product.id}}" class="btn btn-xs btn-warning">
                                    Edit
                                </router-link>
                                <a href="#"
                                class="btn btn-xs btn-danger"
                                v-on:click="deleteProduct(product.id, index)">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.peopleId = id;
            axios.get('/api/v1/people/' + id )
                .then(function (resp) {
                    app.person = resp.data;
                })
                .catch(function () {
                    alert("Could not load person")
                });
        },
        data: function () {
            return {
                person : {}
            }
        },
        methods: {
            deleteProduct(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/products/' + id)
                        .then(function (resp) {
                            app.person.products.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete product");
                        });
                }
            }
        }
    }
</script>