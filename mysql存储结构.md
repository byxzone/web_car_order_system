user		用户表

​	id	用户id

​	username 登录名

​	name	 用户姓名

​	password		 密码(MD5)

​	phone	电话号码

​	type	 类型(0为学员/1为教练)

​	coach	 归属教练(若本身用户类型为教练此项为空)

class	预约模板表

​	id	模板id

​	coach	教练id

​	time_begin	 开始时间(文本格式，如09:00)

​	time_end	 结束时间(文本格式，如11:00)

​	number	 可预约学员总数

reserve	预约订单表

​	id	 预约订单id

​	template	 int型，对应class表中模板id

​	date		日期，文本型，精确到日，03-18

​	coach	教练id

​	user		学员id

​	stat	 订单当前状态：0已预约未进行/1已预约已完成/2已预约已取消