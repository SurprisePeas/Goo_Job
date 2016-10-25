<?php

Route::get('/','Home/Index/index');//首页
Route::controller('/SurprisePeas', 'Home/Index');

//公司--------
Route::get('Company_adm.html','Home/Company/index');//公司[首页]
Route::post('Company_adm.html','Home/Company/index');//公司[首页]
Route::get('CompanyJ_adm.html','Home/Company/jobs');//公司[职位]
Route::post('CompanyJ_adm.html','Home/Company/jobs');//公司[职位]
// Route::get('Company_verify.html','Home/Company/verify');//公司[职位]
Route::get('Company_{cpid}.html','Home/Company/indexShow');//'查看'公司首页
Route::get('CompanyJ_{cpid}.html','Home/Company/jobsShow');//'查看'公司[职位]首页
Route::get('Persona.html','Home/Persona/index');//查看公司[用户个人中心]
Route::get('Persona_password.html','Home/Persona/editpassword');//查看公司[用户个人中心]

//职位
Route::get('myJob_.html','Home/Job/index');//公司:发布职位显示
Route::post('myJob_.html','Home/Job/index');//公司:发布职位显示
Route::get('comRes.html','Home/CompanyResume/index');//公司:收到的简历
Route::post('comRes.html','Home/CompanyResume/index');//公司:收到的简历
Route::get('Job_{jid}.html','Home/Job/content');//查看[职位内容]首页

//个人[信息中心]
Route::get('Jobhunter_my.html','Home/Jobhunter/index');//[个人简历]
Route::post('Jobhunter_my.html','Home/Jobhunter/index');//[个人简历]
Route::get('Resume_box.html','Home/Jobhunter/send');//[简历投递箱]
Route::get('Persona_user.html','Home/Persona/index');//[简历投递箱]






