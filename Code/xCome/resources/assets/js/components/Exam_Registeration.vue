<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-exam-reg">
                    <div v-if="type=='manager'" id="add-exam">

                        <button class="btn-secondary" id="addExam" onclick="popupAddExam.hidden = false;addExam.hidden = true;">Add new exam</button>

                        <div id="popupAddExam" hidden>
                            <h4>new Exam Informations</h4>
                            <input id="exam-type" type="name" name="name" placeholder="Name" v-model="new_exam.name" required><br>
                            <input id="exam-price" type="number" name="price" placeholder="Price" v-model="new_exam.price" required><br>
                            <input id="exam-fee" type="number" name="fee" placeholder="Fee" v-model="new_exam.fee" required><br>
                            <input id="exam-pay-type" type="text" name="pay" placeholder="Pay Type" v-model="new_exam.pay_type" required><br>
                            <input id="exam-date" type="date" name="date" placeholder="Date" v-model="new_exam.date" required><br>
                            <input id="exam-time" type="time" name="date" placeholder="Date" v-model="new_exam.time" required><br>
                            <button id="add" data-dismiss="modal" v-on:click="send_new_exam(new_exam)" class="btn-secondary">Add</button>
                        </div>

                    </div>


                    <form method="post" :action="this.buyExamURL">
                        <input type="hidden" name="_token" v-model="csrf"><br/>
                        <!-- TODO       the address should be dynamic -->
                        <table id="exams-table" class="table">
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
                        <input type="submit" value="Buy" id="buy-butt" class="btn-secondary">

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
                csrf : '',
//                hyperLinks: [],
                type: '',

                new_exam: {
                    name: '',
                    date: '',
                    fee: '',
                    price: '',
                    time: '',
                    pay_type: ''
                }

            }
        },
        mounted() {
            console.log(this.x_data);
            this.exams = this.x_data.exams;
            this.csrf = this.csrf_field;
            this.buyExamURL = window.customURLs.buyExam;
            this.type = this.x_data.type;
//            this.hyperLinks = this.x_data.hyperLinks;

        },
        methods: {


            send_new_exam(new_exam) {
                window.axios.post(window.customURLs.addNewExam, {
                    'new_exam': new_exam
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data);
                    if (respond.data === 'done'){
                        location.reload();
                    }
//                  console.log(JSON.parse(respond));

                }).catch(e => {
                    console.log(e)
                })
            },
        }
    }
</script>