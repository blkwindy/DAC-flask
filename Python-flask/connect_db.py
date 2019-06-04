#!/usr/bin/python3
import pymysql
import traceback
import numpy as np


def user():
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = "SELECT * from user;"
    try:
        cursor.execute(sql)
        data = cursor.fetchall()
        cursor.close()
        db.close()
        return data
    except:
        traceback.print_exc()
        db.rollback()


def findusername():
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = 'select username from user'
    try:
        cursor.execute(sql)
        data = np.array(cursor.fetchall())
        cursor.close()
        db.close()
        return data
    except:
        traceback.print_exc()
        db.rollback()


def findFilePrivilege(username):
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = "select file1,file2,file3,file4,file5 from user where username = '%s'" % username
    try:
        cursor.execute(sql)
        rows = np.array(cursor.fetchall()[0])
        cursor.close()
        db.close()
        return rows
    except:
        traceback.print_exc()
        db.rollback()


def updateFilePrivilege(username, privileges):
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = 'update user set file1=' + privileges['file1'] + ',file2=' + privileges['file2'] + ',file3=' + \
          privileges['file3'] + ',file4=' + privileges['file4'] + ',file5=' + privileges['file5'] + \
          ' where username ="'+username+'"'
    print(sql)
    try:
        cursor.execute(sql)
        db.commit()
        cursor.close()
        db.close()
    except:
        traceback.print_exc()
        db.rollback()


def checkuser(username, password):
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = "select username,password from user where username='%s' and password='%s'" % (username, password)
    try:
        # 执行sql语句
        cursor.execute(sql)
        db.commit()
        result = cursor.fetchall()
        cursor.close()
        db.close()
        return len(result)
    # 如果发生错误则回滚
    except:
        traceback.print_exc()
        db.rollback()


def registuser(username, password):
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = "INSERT INTO user(username,password,file1,file2,file3,file4,file5) VALUES ('%s','%s',%s,%s,%s,%s,%s)" \
          % (username, password, 0, 0, 0, 0, 0)
    try:
        # 执行sql语句
        cursor.execute(sql)
        # 提交到数据库执行
        db.commit()
        cursor.close()
        db.close()
        return cursor.rowcount
    except:
        # 抛出错误信息
        traceback.print_exc()
        # 如果发生错误则回滚
        db.rollback()


def checkfile(username, file):
    db = pymysql.connect("localhost", "root", "root", "test")
    cursor = db.cursor()
    sql = "select %s from user where username = '%s'" % (file, username)
    try:
        # 执行sql语句
        cursor.execute(sql)
        result = np.array(cursor.fetchall()[0])[0]
        cursor.close()
        db.close()
        return result
    # 如果发生错误则回滚
    except:
        traceback.print_exc()
        db.rollback()
