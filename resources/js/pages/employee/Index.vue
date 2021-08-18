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
    <div class="card mx-auto">
      <div v-if="showMessage">
        <div class="alert alert-success">{{ message }}</div>
      </div>
      <div class="card-header">
        <div class="d-flex align-items-center">
          <form
            class="
              d-none d-sm-inline-block
              form-inline
              mr-auto
              ml-md-3
              my-2 my-md-0
              mw-100
              navbar-search
            "
          >
            <div class="d-flex row justify-content-between">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Search for..."
                  v-model.lazy="search"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
              <div class="col">
                <select
                  v-model="selectdepartments"
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
              </div>
            </div>
          </form>
          <router-link :to="{ name: 'EmployeeCreate' }" class="float-right">
            <i class="fa fa-plus"></i>
          </router-link>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col" class="text-center">Manage</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <td>{{ employee.id }}</td>
              <td>{{ employee.first_name }}</td>
              <td>{{ employee.last_name }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.department.name }}</td>
              <td>
                <div class="d-flex justify-content-between align-items-center">
                  <router-link
                    :to="{ name: 'EmployeeEdit', params: { id: employee.id } }"
                    class="btn btn-outline-success"
                  >
                    Edit
                  </router-link>
                  <button
                    class="btn btn-outline-danger"
                    @click="deleteEmployee(employee.id)"
                  >
                    Delete
                  </button>
                </div>
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
  data() {
    return {
      employees: [],
      showMessage: false,
      message: "",
      departments: [],
      selectdepartments: null,
      search: null,
    };
  },

  watch: {
    search() {
      this.getEmployee();
    },
    selectdepartments() {
      this.getEmployee();
    },
  },
  created() {
    this.getEmployee();
    this.getDepartments();
  },
  methods: {
    getEmployee() {
      axios
        .get("/api/employee/", {
          params: {
            search: this.search,
            department_id: this.selectdepartments,
          },
        })
        .then((res) => {
          this.employees = res.data.data;
        })
        .catch((error) => {
          console.log(error);
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
    deleteEmployee(id) {
      axios.delete("/api/employee/" + id).then((res) => {
        this.showMessage = true;
        this.message = res.data;
        this.getEmployee();
      });
    },
  },
};
</script>

<style>
</style>