let host: string = 'http://localhost:7001/api';

export let api_GuestEntrar: string = host + '/guest/session/get';
export let api_GuestGetUser: string = host + '/guest/users/get';
export let api_GuestAddUser: string = host + '/guest/users/add';
export let api_GuestGetEvents: string = host + '/guest/events/get';

export let api_UserAddEvent: string = host + '/user/events/add';
export let api_UserGetEvents: string = host + '/user/events/get';
export let api_UserAddComplaint: string = host + '/user/complaints/add';
export let api_UserAddAttendance: string = host + '/user/attendances/add';
export let api_UserGetAttendances: string = host + '/user/attendances/get';

export let api_AdminGetComplaints: string = host + '/admin/complaints/get';
export let api_AdminAddReviewRoutine: string = host + '/admin/reviews/add';
export let api_AdminDelComplaint: string = host + '/admin/complaints/del';
export let api_AdminDelEvent: string = host + '/admin/events/del';
export let api_AdminGetEvents: string = host + '/admin/events/get';

export let api_testAdmin: string = host + '/test/admin';
export let api_testUser: string = host + '/test/user';
export let api_test401: string = host + '/test/401';
