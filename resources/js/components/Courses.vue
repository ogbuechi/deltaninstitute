<template>
    <div class="form-layout form-layout-1">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="tx-gray-800 mg-b-5">A level subjects/courses</h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-10">
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table table-hover mg-b-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="(item,index) in courses">
                                <th scope="row">{{ index+1 }}</th>
                                <td>{{ item}} </td>
                                <td>
                                    <button @click="removeCourse(index)" title="Remove This Course/Subject" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
<!--                                    <i @click="delete" class="fa fa-trash" /> -->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <form @submit.prevent="addCourse">

        <div class="row mg-b-25 mt-4">

                <div class="col-10">
                    <div class="form-group">
                        <label class="form-control-label">Course/Subject Name : <span class="tx-danger">*</span></label>
                        <input v-model="course" class="form-control" type="text" placeholder="Enter name">
                    </div>
                    <button class="btn btn-info" type="submit">Save and add more</button>

                </div>

            <!-- col-4 -->
            </div><!-- row -->
        </form>

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="tx-gray-800 mg-b-5">Post-Primary Institutions attended, with dates : </h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-10">
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table table-hover mg-b-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name of Institution</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Qualification</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="(item,index) in post_primaries">
                                <th scope="row">{{ index+1 }}</th>
                                <td>{{ item.name_of_institution}}</td>
                                <td>{{ item.from }}</td>
                                <td>{{ item.to }}</td>
                                <td>{{ item.qualifications }}</td>
                                <td><button @click="removePostPrimaries(index,item.id)" title="Remove This Course/Subject" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <form method="POST" @submit.prevent="addPostPrimaries">
        <div class="row mg-b-25 mt-4">
                    <div class="col-10">
                        <div class="form-group">
                            <label class="form-control-label">Name of Institution : <span class="tx-danger">*</span></label>
                            <input v-model="form.name_of_institution" required class="form-control" type="text" placeholder="Enter name of institution">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label class="form-control-label">From : <span class="tx-danger">*</span></label>
                            <input v-model="form.from" class="form-control" type="text" placeholder="Enter from date">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label class="form-control-label">To : <span class="tx-danger">*</span></label>
                            <input v-model="form.to" class="form-control" type="text" placeholder="Enter to date">
                        </div>
                    </div>

                <div class="col-10">
                    <div class="form-group">
                        <label class="form-control-label">Qualifications Obtained : <span class="tx-danger">*</span></label>
                        <input v-model="form.qualifications" class="form-control" type="text" placeholder="Enter qualification">
                    </div>
                </div>

                <div class="col-10">
                    <button class="btn btn-info" type="submit">Save and add more</button>
                </div>





            </div><!-- row -->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">School Certificates Results : WAEC/NECO SSCE / NABTEB / Others: </h4>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-10">
                <div class="bd bd-gray-300 rounded table-responsive">
                    <table class="table mg-b-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name of Examination</th>
                            <th>Date of Examination</th>
                            <th>Exam No.</th>
                            <th>Subject Grades</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(item,index) in certifications">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ item.name_of_exam }} </td>
                            <td>{{ item.date_of_exam }} </td>
                            <td>{{ item.exam_number }} </td>
                            <td></td>
                            <td>
                                <button @click="removeCourse(index)" title="Remove This Course/Subject" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                <!--                                    <i @click="delete" class="fa fa-trash" /> -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <form method="POST" @submit.prevent="addCertifications">
        <div class="row mg-b-25 mt-4">
                    <div class="col-10">
                        <div class="form-group">
                            <label class="form-control-label">Name of Exam : <span class="tx-danger">*</span></label>
                            <input v-model="form_b.name_of_exam" required class="form-control" type="text" placeholder="Enter name of institution">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label class="form-control-label">Date of Exam : <span class="tx-danger">*</span></label>
                            <input required v-model="form_b.date_of_exam" class="form-control" type="text" placeholder="Enter from date">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label class="form-control-label">Exam Number : <span class="tx-danger">*</span></label>
                            <input required v-model="form_b.exam_number" class="form-control" type="text" placeholder="Enter to date">
                        </div>
                    </div>


                <div class="col-10">
                    <button class="btn btn-info" type="submit">Save and add more</button>
                </div>





            </div><!-- row -->
        </form>

    </div>
</template>

<script>
    export default {
        props:['all_courses','all_certifications','id','p_primaries'],
        data(){
            return {
                not_working : false,
                add_more:false,
                // courses : [],
                courses : this.all_courses,
                post_primaries : this.p_primaries,
                certifications : this.all_certifications,
                course:'',
                subject_grades : {subject:'', grade:''},
                form: {
                    name_of_institution:'',
                    to:'',
                    from:'',
                    qualifications:'',
                    admission_id:this.id
                },
                form_b: {
                    name_of_exam:'',
                    date_of_exam:'',
                    exam_number:'',
                    admission_id:this.id
                }
            }
        },
        methods:{
            addCourse(){
                this.not_working = true;
                this.courses.push(this.course);
                this.course = '';
                // this.showAddEd = false;
                axios.post("/admission/update", {courses:this.courses}).then(resp => {
                    // this.success('New Subject/Course successfully added, add more');
                    alertify.success('New Subject/Course successfully added, add more');
                    this.not_working = false;
                });
            },
            addGrade(){
                this.not_working = true;
                this.courses.push(this.course);
                this.course = '';
                // this.showAddEd = false;
                axios.post("/admission/update", {courses:this.courses}).then(resp => {
                    // this.success('New Subject/Course successfully added, add more');
                    alertify.success('New Subject/Course successfully added, add more');
                    this.not_working = false;
                });
            },
            addPostPrimaries(){
                this.not_working = true;
                // this.showAddEd = false;
                axios.post("/admission/post_primaries", this.form).then(resp => {
                    // this.success('New Subject/Course successfully added, add more');
                    this.post_primaries.push(resp.data);
                    this.form.name_of_institution = '',
                    this.form.from = '',
                    this.form.to = '',
                    this.form.qualifications = '',
                    alertify.success('New Post Primary successfully added, add more');
                    this.not_working = false;
                });
            },
            addCertifications(){
                this.not_working = true;
                // this.showAddEd = false;
                axios.post("/admission/certifications", this.form_b).then(resp => {
                    // this.success('New Subject/Course successfully added, add more');
                    this.certifications.push(resp.data);
                    this.form_b.name_of_exam = '',
                    this.form_b.date_of_exam = '',
                    this.form_b.exam_number = '',
                        alertify.success('New Post Primary successfully added, add more');
                    this.not_working = false;
                });
            },
            removeCourse(index){
                this.courses.splice(index, 1);
                alertify.success('You successfully removed one course');
                axios.post("/admission/update", {courses:this.courses}).then(resp => {
                });
            },
            removePostPrimaries(index,id){
                this.post_primaries.splice(index, 1);
                alertify.success('You successfully removed one post primaries');
                axios.post("/admission/post_primaries/delete", {id:id}).then(resp => {
                });
            },
        }
    }
</script>
