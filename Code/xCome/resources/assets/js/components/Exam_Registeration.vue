<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="wp-exam-reg">
                    <div v-if="type=='manager'" id="add-exam">

                        <button id="addExam" onclick="popupAddExam.hidden = false;addExam.hidden = true;">Add new exam</button>

                        <div id="popupAddExam" hidden>
                            <h4>new Exam Informations</h4>
                            <input id="exam-type" type="name" name="name" placeholder="Name" v-model="new_exam.name"><br>
                            <input id="exam-price" type="number" name="price" placeholder="Price" v-model="new_exam.price"><br>
                            <input id="exam-fee" type="number" name="fee" placeholder="Fee" v-model="new_exam.fee"><br>
                            <input id="exam-date" type="date" name="date" placeholder="Date" v-model="new_exam.date"><br>
                            <button id="add" data-dismiss="modal" v-on:click="send_new_exam(new_exam)">Add</button>
                        </div>

                    </div>


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
                csrf : '',
//                hyperLinks: [],
                type: '',

                new_exam: {
                    name: '',
                    date: '',
                    fee: '',
                    price: ''
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
                window.axios.post('http://localhost:8888/profile/add-new-exam', {
                    'new_exam': new_exam
                }, {
                    Cookie: document.cookie,
                    'Access-Control-Allow-Origin': '*',
                    "Access-Control-Allow-Headers": "X-CSRF-TOKEN, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Origin"
                }).then(respond => {

                    console.log(respond);
                    console.log(respond.data)
//                  console.log(JSON.parse(respond));

                }).catch(e => {
                    console.log(e)
                })
            },
        }
    }
</script>