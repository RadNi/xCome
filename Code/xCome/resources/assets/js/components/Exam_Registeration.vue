<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-exam-reg">
                    <form method="post" :action="this.buyExamURL">
                        <input type="hidden" name="_token" v-model="csrf"><br/>
                        <!-- TODO       the address should be dynamic -->
                        <table id="exams-table">
                        <td v-for="exam in this.exams">
                            <div :id="exam.id" class="exam">
                                <p class="exam-name">{{ exam.name }}</p>
                                <p class="exam-price">{{ exam.price }}</p>
                                <p class="exam-fee">{{ exam.fee }}</p>
                                <p class="exam-date">{{ exam.date }}</p>
                                <input type="radio" name="exam" :value="exam.id"/>
                            </div>
                        </td>
                            <!--<div id="exam1" class="exam">-->
                                <!--<p class="exam-type">GRE</p>-->
                                <!--<p class="exam-price">812</p>-->
                                <!--<p class="exam-fee">20</p>-->
                                <!--<p class="exam-date">date</p>-->
                            <!--</div>-->
                        <!--</td>-->
                        <!--<td>-->
                            <!--<div id="exam2" class="exam">-->
                                <!--<p class="exam-type">TOFEL</p>-->
                                <!--<p class="exam-price">421</p>-->
                                <!--<p class="exam-fee">20</p>-->
                                <!--<p class="exam-date">date</p>-->
                            <!--</div>-->
                        <!--</td>-->
                        <!--<td>-->
                            <!--<div id="exam3" class="exam">-->
                                <!--<p class="exam-type">IELTS</p>-->
                                <!--<p class="exam-price">312</p>-->
                                <!--<p class="exam-fee">20</p>-->
                                <!--<p class="exam-date">date</p>-->
                            <!--</div>-->
                        <!--</td>-->
                        </table>
                        <input type="submit" value="Buy" id="buy-butt"/>

                    </form>
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
                exams : [],
                buyExamURL : '',
                csrf : ''
//                hyperLinks: [],
//                type: ''
            }
        },
        mounted() {
            console.log(this.x_data);
            this.exams = this.x_data.exams;
            this.csrf = this.csrf_field;
            this.buyExamURL = window.customURLs.buyExam;
//            this.type = this.x_data.type;
//            this.hyperLinks = this.x_data.hyperLinks;

        },
        methods: {
//            changeLocation(link) {
//                console.log(`going to ${link}`);
//                location.href = link;
//            },
        }
    }
</script>