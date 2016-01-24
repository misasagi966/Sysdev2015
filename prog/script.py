#!/usr/bin/python
# -*- coding: utf-8 -*-

import commands
import time
import sys
import MySQLdb
from MySQLdb.cursors import DictCursor 
from login import *
def process_row(row):
  print row

while True:
  con = MySQLdb.connect(host = db_hostname,db = db_database,user = db_username,passwd = db_password)

  # SELECT
  cur = con.cursor()                        # connectionから取得したcursorからsqlを発行する
  recorddata = cur.execute('SELECT * FROM '+db_table+' WHERE Flag = 1 OR Flag = 2')  # executeは行数を返却
  res = cur.fetchall()                      # fetchone, fetchmany, fetchallで結果取得
  print "Unprocessed Data: ", recorddata, "\r",
  sys.stdout.flush();
  if recorddata > 0:
    count = 0
    for row in res:
      print ""
      process_row(row)                        # 各行はtuple (No(int), 'OriginalName'(char),Flag(int) , Title, Comment, Timestamp, UserName)
      cur.execute('UPDATE '+db_table+' SET Flag = 2 WHERE No = %s', (row[0]))
      con.commit()   # UPDATEのみcommitしないと反映されない
      check = commands.getoutput("./merge.sh "+ str(row[0]) +" " + row[1] + " " + str(row[3]) + ".cfg");
      cur.execute('UPDATE '+db_table+' SET Flag = 3 WHERE No = %s', (row[0]))
      con.commit()   # UPDATEのみcommitしないと反映されない
      count += 1
      print "Unprocessed Data: ", recorddata-(count), "\r",

  else:
    time.sleep(10)
  cur.close()
  con.close()

