<template>
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<div class="col-md-8 col-md-offset-2">-->
                <!--&lt;!&ndash;<table id="wp-navbar-table">&ndash;&gt;-->
                    <!--<td v-for="item in this.wp_items" class="wp-item">-->
                        <!--<button :id='item.id' class="nav-butt" v-on:click="changeLocation(item.link)">{{ item.text }}</button>-->
                    <!--</td>-->
                    <!--<td class="wp-item">-->
                        <!--<button id="exam-reg" class="nav-butt" onclick="location.href = '{{ route("user.profile.exam-reg") }}'">Exam Registration</button>-->
                    <!--</td>-->

                    <!--<td class="wp-item">-->
                        <!--<button id="apply-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.apply-pay") }}'">Apply Payment</button>-->
                    <!--</td>-->

                    <!--<td class="wp-item">-->
                        <!--<button id="foreign-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.for-pay") }}'">Foreign Payment</button>-->
                    <!--</td>-->

                    <!--<td class="wp-item">-->
                        <!--<button id="retr-mon" class="nav-butt" onclick="location.href = '{{ route("user.profile.ret-mon") }}'">Retrieve Money</button>-->
                    <!--</td>-->

                    <!--<td class="wp-item">-->
                        <!--<button id="int-pay" class="nav-butt" onclick="location.href = '{{ route("user.profile.int-trans") }}'">Internal Transaction</button>-->
                    <!--</td>-->

                    <!--<td class="wp-item">-->
                        <!--<button id="wallet" class="nav-butt" onclick="location.href = '{{ route("user.profile.wallet") }}'" >Wallets</button>-->
                    <!--</td>-->

                <!--</table>-->

            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="/">xCome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownPayment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Payment Activities
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPayment">
                        <a class="dropdown-item" v-for="item in this.wp_items" :id="item.id" v-bind:href=item.link>{{item.text}}</a>>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" v-for="hl in this.hyperLinks" :id="hl.id" v-bind:href=hl.link>{{hl.text}}</a>>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" v-for="action in this.actions" :id="action.id" v-bind:href=action.link>
                         {{action.text}}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>

    export default {
        name: 'navbar',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                wp_items:[],
                hyperLinks: [],
                actions: [],
                type: ''
            }
        },
        mounted() {
            this.type = this.x_data.type;
            this.wp_items = this.x_data.wp_items;
            this.hyperLinks = this.x_data.hyperLinks;
            this.actions = this.x_data.actions;
        },
        methods: {
            changeLocation(link) {
                location.href = link;
            },
        }
    }
</script>