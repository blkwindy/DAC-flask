from flask import Flask, redirect, url_for, request, render_template
from connect_db import *

app = Flask(__name__)
# app是Flask的实例，它接收包或者模块的名字作为参数，但一般都是传递__name__。
# 使用app.route装饰器会将URL和执行的视图函数的关系保存到app.url_map属性上。

# 默认路径访问登录页面
@app.route('/')
def login():
    return render_template('login.html')

# 默认路径访问注册页面
@app.route('/regist',methods=['GET', 'POST'])
def regist():
    return render_template('regist.html')

# 获取注册请求及处理
@app.route('/registuser', methods=['GET', 'POST'])
def getRigistRequest():
    # 把用户名和密码注册到数据库中
    result = registuser(request.args.get('user'), request.args.get('password'))
    if result == 1:
        return render_template('login.html')
    else:
        return '注册失败'

# 获取登录参数及处理
@app.route('/login', methods=['GET', 'POST'])
def getLoginRequest():
    # 查询用户名及密码是否匹配及存在
    username = request.args.get('user')
    results = checkuser(username, request.args.get('password'))
    if results == 1:
        if username == 'admin':
            return redirect('/admin')
        else:
            return redirect(url_for('User', user=username))
    else:
        return '用户名或密码不正确'


@app.route('/User?user=<user>', methods=['GET', 'POST'])
def User(user):
    privilege = findFilePrivilege(user)
    return render_template('User.html', user=user, privilege=privilege)


@app.route('/admin', methods=['GET', 'POST'])
def admin():
    privileges = {'file1': '', 'file2': '', 'file3': '', 'file4': '', 'file5': ''}
    if request.method == 'GET':
        file = user()
        return render_template('admin.html', file=file)
    else:
        username = request.values.get("filename")
        print(username)
        if len(username) == 0:
            return render_template('admin.html')
        for i in privileges:
            privileges[i] = request.values.get(i)
        updateFilePrivilege(username, privileges)
        return render_template('login.html')


# 默认Flask只监听虚拟机的本地127.0.0.1这个地址，端口为666。
if __name__ == '__main__':
    app.run(host='127.0.0.1', port=666, threaded=True)
