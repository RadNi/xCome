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
    <!--<nav class="navbar navbar-default">-->
        <!--<div class="container-fluid">-->
            <!--<div class="navbar-header">-->
                <!--<a class="navbar-brand" href="/welcome">xCome</a>-->
            <!--</div>-->

            <!--<ul class="nav navbar-nav">-->
                <!--<li class="active" v-for="item in this.wp_items" :id="item.id" ><a v-bind:href=item.link>{{item.text}}</a></li>-->
            <!--</ul>-->
        <!--</div>-->
    <!--</nav>-->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">xCome</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Payment Activities<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active" v-for="item in this.wp_items" :id="item.id" ><a v-bind:href=item.link>{{item.text}}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">User Pages<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active" v-for="item in this.hyperLinks" :id="item.id" ><a v-bind:href=item.link>{{item.text}}</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li v-for="action in this.actions" :id="action.id"><a v-bind:href=action.link><span class="glyphicon glyphicon-log-in"></span> {{action.text}}</a></li>
                </ul>
            </div>
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