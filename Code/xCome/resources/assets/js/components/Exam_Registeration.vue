<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-exam-reg">
                    <table id="exams-table">
                        <td v-for="exam in this.exams">
                            <div :id="exam.id" class="exam">
                                <p class="exam-type">GRE</p>
                                <p class="exam-price">812</p>
                                <p class="exam-fee">20</p>
                                <p class="exam-date">date</p>
                                <button id="buy-butt">Buy</button>
                            </div>
                            <div id="exam1" class="exam">
                                <p class="exam-type">GRE</p>
                                <p class="exam-price">812</p>
                                <p class="exam-fee">20</p>
                                <p class="exam-date">date</p>
                                <button id="buy-butt">Buy</button>
                            </div>
                        </td>
                        <td>
                            <div id="exam2" class="exam">
                                <p class="exam-type">TOFEL</p>
                                <p class="exam-price">421</p>
                                <p class="exam-fee">20</p>
                                <p class="exam-date">date</p>
                                <button id="buy-butt">Buy</button>
                            </div>
                        </td>
                        <td>
                            <div id="exam3" class="exam">
                                <p class="exam-type">IELTS</p>
                                <p class="exam-price">312</p>
                                <p class="exam-fee">20</p>
                                <p class="exam-date">date</p>
                                <button id="buy-butt">Buy</button>
                            </div>
                        </td>
                    </table>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {
        name: 'exam_reg',
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