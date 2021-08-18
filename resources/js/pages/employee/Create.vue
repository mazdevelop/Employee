<template>
  <div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employee</h1>
      <a
        href="#"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
        ><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a
      >
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center justify-content-between">
                <div>Create</div>
                <router-link
                  :to="{ name: 'EmployeeIndex' }"
                  class="btn btn-outline-primary"
                >
                  back
                </router-link>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" @submit.prevent="storeEmployee">
                <div class="form-group row">
                  <label
                    for="first_name"
                    class="col-md-4 col-form-label text-md-right"
                    >First Name</label
                  >

                  <div class="col-md-6">
                    <input
                      id="first_name"
                      v-model="form.first_name"
                      type="text"
                      class="form-control"
                      name="first_name"
                      required
                    />
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="middle_name"
                    class="col-md-4 col-form-label text-md-right"
                    >Middle Name</label
                  >

                  <div class="col-md-6">
                    <input
                      id="middle_name"
                      v-model="form.middle_name"
                      type="text"
                      class="form-control"
                      name="middle_name"
                      required
                    />
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="last_name"
                    class="col-md-4 col-form-label text-md-right"
                    >Last Name</label
                  >
                  <div class="col-md-6">
                    <input
                      id="last_name"
                      v-model="form.last_name"
                      type="text"
                      class="form-control"
                      name="last_name"
                      required
                    />
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="zip_code"
                    class="col-md-4 col-form-label text-md-right"
                    >Zip Code</label
                  >
                  <div class="col-md-6">
                    <input
                      id="zip_code"
                      v-model="form.zip_code"
                      type="text"
                      class="form-control"
                      name="zip_code"
                      required
                    />
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="country"
                    class="col-md-4 col-form-label text-md-right"
                    >Country</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.country_id"
                      @change="getStates()"
                      id="country"
                      type="text"
                      class="form-control"
                      name="country"
                    >
                      <option value="" selected>open this select menu</option>
                      <option
                        v-for="country in countries"
                        :key="country.id"
                        :value="country.id"
                      >
                        {{ country.name }}
                      </option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="state"
                    class="col-md-4 col-form-label text-md-right"
                    >State</label
                  >
                  <div class="col-md-6">
                    <select
                      v-model="form.state_id"
                      @change="getCities()"
                      id="state"
                      type="text"
                      class="form-control"
                      name="state"
                    >
                      <option value="" selected>open this select menu</option>
                      <option
                        v-for="state in states"
                        :key="state.id"
                        :value="state.id"
                      >
                        {{ state.name }}
                      </option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="department"
                    class="col-md-4 col-form-label text-md-right"
                    >Department</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.department_id"
                      id="department"
                      type="text"
                      class="form-control"
                      name="department"
                    >
                      <option value="" selected>open this select menu</option>
                      <option
                        v-for="department in departments"
                        :key="department.id"
                        :value="department.id"
                      >
                        {{ department.name }}
                      </option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="city"
                    class="col-md-4 col-form-label text-md-right"
                    >City</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.city_id"
                      id="city"
                      type="text"
                      class="form-control"
                      name="city"
                    >
                      <option value="" selected>open this select menu</option>
                      <option
                        v-for="city in cities"
                        :key="city.id"
                        :value="city.id"
                      >
                        {{ city.name }}
                      </option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="address"
                    class="col-md-4 col-form-label text-md-right"
                    >Address</label
                  >

                  <div class="col-md-6">
                    <textarea
                      id="address"
                      v-model="form.address"
                      rows="4"
                      class="form-control"
                      name="address"
                      required
                    ></textarea>
                    <span class="invalid-feedback" role="alert">
                      <strong></strong>
                    </span>
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <div class="col-md-4 col-form-label text-md-right">
                    Birthdate
                  </div>
                  <div class="col-md-6">
                    <datepicker
                      v-model="form.brithdate"
                      input-class="form-control"
                    ></datepicker>
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <div class="col-md-4 col-form-label text-md-right">
                    Date Hired
                  </div>
                  <div class="col-md-6">
                    <datepicker
                      v-model="form.date_hired"
                      input-class="form-control"
                    ></datepicker>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Store</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
  components: {
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      departments: [],
      cities: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        department_id: "",
        country_id: "",
        state_id: "",
        city_id: "",
        zip_code: "",
        brithdate: null,
        date_hired: null,
      },
    };
  },
  created() {
    this.getCountries();
    this.getDepartments();
  },
  methods: {
    getCountries() {
      axios
        .get("/api/employee/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    getDepartments() {
      axios
        .get("/api/employee/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    getStates() {
      axios
        .get("/api/employee/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    getCities() {
      axios
        .get("/api/employee/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    storeEmployee() {
      axios
        .post("/api/employee", {
          first_name: this.form.first_name,
          last_name: this.form.last_name,
          middle_name: this.form.middle_name,
          address: this.form.address,
          department_id: this.form.department_id,
          country_id: this.form.country_id,
          state_id: this.form.state_id,
          city_id: this.form.city_id,
          zip_code: this.form.zip_code,
          brithdate: this.format_date(this.form.brithdate),
          date_hired: this.format_date(this.form.date_hired),
        })
        .then((res) => {
          this.$router.push({ name: "EmployeeIndex" });
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    format_date(value) {
      if (value) {
        return moment(String(value)).format("YYYYMMDD");
      }
    },
  },
};
</script>

<style>
</style>