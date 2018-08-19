<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table id="hyperlink-table" cellpadding="20">
                    <td v-for="hl in this.hyperLinks" :id="hl.id" v-on:click="changeLocation(hl.link)">
                        {{ hl.text }}
                    </td>
                    <!--<td id="mainpage">-->
                        <!--<a href="{{ route($type.'.profile') }}">Main Page</a>-->
                    <!--</td>-->
                    <!--<td id="userinfo">-->
                        <!--<a href="{{ route($type.".info") }}">User information</a>-->
                    <!--</td>-->
                    <!--<td id="transactions">-->
                        <!--<a href="{{ route($type.".transactions") }}">Transaction History</a>-->
                    <!--</td>-->
                </table>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'scroll_left',
        props: ['x_data', 'csrf_field'],
        data() {
            return {
                hyperLinks: [],
                type: ''
            }
        },
        mounted() {
            this.type = this.x_data.type;
            this.hyperLinks = this.x_data.hyperLinks;

        },
        methods: {
            changeLocation(link) {
                console.log(`going to ${link}`)
                location.href = link;
            },
        }
    }
</script>