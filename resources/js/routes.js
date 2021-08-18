import EmployeeIndex from './pages/employee/Index';
import EmployeeCreate from './pages/employee/Create';
import EmployeeEdit from './pages/employee/Edit';

export const routes = [
    {
        path: "/employee",
        name: "EmployeeIndex",
        component: EmployeeIndex
    },
    {
        path: "/employee/create",
        name: "EmployeeCreate",
        component: EmployeeCreate
    },
    {
        path: "/employee/:id",
        name: "EmployeeEdit",
        component: EmployeeEdit
    },
];