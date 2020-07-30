import time

import pymysql
import os, sys

# 命名规则： 作业1的教师端contaniner为c_h1,作业2的学生10的container为c_h2_s10
#          作业1的image为i_h1
# 扫描数据库，若有need_create='1'的container则创建，然后把need_create改成0
while 1:

    db = pymysql.connect("localhost", "root", "a1021822981", "net")
    cursor = db.cursor()
    sql = "select port,container_name,image_name from container where need_create='1'"

    try:
        cursor.execute(sql)
        results = cursor.fetchall()
        for row in results:
            port = row[0]
            container_name1 = row[1]
            image_name = row[2]
            str1 = "docker run -d -it --name " + container_name1 + " -p " + str(port) + ":22 " + image_name
            print(str1)
            r = os.system(str1)
            # 把need_create改成0
            sql = "update container set need_create='0' where container_name='%s'" % (container_name1)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e1:
                print(e1)
                db.rollback()
    except Exception as e2:
        print(e2)
        print("Error")


# 需要删除的容器(need_create=2)
    sql = "select port,container_name,image_name from container where need_create='2'"

    try:
        cursor.execute(sql)
        results = cursor.fetchall()
        for row in results:
            port = row[0]
            container_name1 = row[1]
            image_name = row[2]
            # docker stop container_name1
            str1 = "docker stop " + container_name1
            #docker rm container_name1
            str2 = "docker rm " + container_name1
            # str1 = "docker run -d -it --name " + container_name1 + " -p " + str(port) + ":22 " + image_name
            print(str1)
            print(str2)
            r = os.system(str1)
            r2 = os.system(str2)
            # 在container表中删除该容器
            sql = "delete from container where container_name='%s'" % (container_name1)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
                #在port表中把port的状态更新成0
                sql = "update port set flag='0' where port='%d'" % (port)
                print(sql)
                try:
                    cursor.execute(sql)
                    db.commit()
                except Exception as e11:
                    print("!")
            except Exception as e1:
                print(e1)
                db.rollback()
    except Exception as e2:
        print(e2)
        print("Error")
    # 命名规则： 作业1的教师端contaniner为c_h1,作业2的学生10的container为c_h2_s10
    #          作业1的image为i_h1
    # 扫描数据库，若有need_commit='1'的container则commit成image，然后把need_commit改成0
    # 然后写入image表
    db = pymysql.connect("localhost", "root", "a1021822981", "net")
    cursor = db.cursor()
    sql = "select homework_id,container_name,user_id from container where need_commit='1'"
    try:
        cursor.execute(sql)
        results = cursor.fetchall()
        for row in results:
            homework_id = row[0]
            container_name = row[1]
            user_id = row[2]
            #container_name
            container_namee = "c_u"+str(user_id)+"_h"+str(homework_id)
            # image_name
            image_name = "i_u"+str(user_id)+"_h"+str(homework_id)
            # 以防万一 先删除一下image
            r1 = os.system("docker image rm "+image_name)
            str1 = "docker commit " + container_namee + " " + image_name
            print(str1)
            r = os.system(str1)
            # 把need_create改成0
            sql = "update container set need_commit='0' where container_name='%s'" % (container_name)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e1:
                print(e1)
                db.rollback()

            # 若image表存在了则删掉
            sql = "delete from image where image_name='%s'" % (image_name)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e1:
                print(e1)
                db.rollback()
            # 写入image表
            sql = "insert image(image_name,homework_id) values('%s','%s')" % (image_name, homework_id)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e1:
                print(e1)
                db.rollback()
            # 写入image表
    except Exception as e2:
        print(e2)
        print("Error")
    # 扫描image表，若有need_del='1'的image则删除，并把表中该项删除
    db = pymysql.connect("localhost", "root", "a1021822981", "net")
    cursor = db.cursor()
    sql = "select image_name from image where need_del='1'"
    try:
        cursor.execute(sql)
        results = cursor.fetchall()
        for row in results:
            image_name = row[0]
            #删除名为image_name的image
            str22 = "docker image rm "+image_name
            print(str22)
            r = os.system(str22)
            # delete
            sql = "delete from image where image_name='%s'" % (image_name)
            print(sql)
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e1:
                print(e1)
                db.rollback()

    except Exception as e2:
        print(e2)
        print("Error")
    # 然后写入image表
    time.sleep(2)