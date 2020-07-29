import time

import pymysql
import os, sys

# 命名规则： 作业1的教师端contaniner为c_h1,作业2的学生10的container为c_h2_s10
#          作业1的image为i_h1
# 扫描数据库，若有need_create='1'的container则创建，然后把need_create改成0
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
        str1 = "docker run -d --name "+container_name1+" -p "+str(port)+":22 "+image_name
        print(str1)
        r = os.system(str1)
        #把need_create改成0
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
time.sleep(2)
# 命名规则： 作业1的教师端contaniner为c_h1,作业2的学生10的container为c_h2_s10
#          作业1的image为i_h1
# 扫描数据库，若有need_commit='1'的container则commit成image，然后把need_commit改成0
# 然后写入image表
db = pymysql.connect("localhost", "root", "a1021822981", "net")
cursor = db.cursor()
sql = "select homework_id,container_name from container where need_commit='1'"
try:
    cursor.execute(sql)
    results = cursor.fetchall()
    for row in results:
        homework_id = row[0]
        container_name = row[1]
        # 以防万一 先删除一下image
        r1 = os.system("docker image rm i_h"+str(homework_id))
        str1 = "docker commit "+container_name+" i_h"+str(homework_id)
        print(str1)
        r = os.system(str1)
        #把need_create改成0
        sql = "update container set need_commit='0' where container_name='%s'" % (container_name)
        print(sql)
        try:
            cursor.execute(sql)
            db.commit()
        except Exception as e1:
            print(e1)
            db.rollback()
        image_name = "i_h"+str(homework_id)
        #若image表存在了则删掉
        sql = "delete from image where image_name='%s'" % (image_name)
        print(sql)
        try:
            cursor.execute(sql)
            db.commit()
        except Exception as e1:
            print(e1)
            db.rollback()
        #写入image表
        sql = "insert image(image_name,homework_id) values('%s','%s')" % (image_name,homework_id)
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
time.sleep(2)