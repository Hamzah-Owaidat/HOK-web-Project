import random
import pymysql
def db():
    host = "localhost"
    username = "root"
    password = ""
    db_name = "hok"
    con = pymysql.connect(host=host, user=username, password=password, database=db_name)
    return con
def insert_score(con, id, score):
    cursor = con.cursor()
    sql = f"INSERT INTO scores(`user_id`, `game_id`, `score`, `date_played`, `created_at`, `updated_at`) VALUES ({id}, 2, {score}, NOW(), NOW(), NOW())"
    cursor.execute(sql)
    con.commit()
class Minesweeper :
    array = [["0"] * 14 for _ in range(9)]
    colors = [[""] * 14 for _ in range(9)]
    v_inv = [["inv"] * 14 for _ in range(9)]
    flag = [[""] * 14 for _ in range(9)]
    face_emoji = "🙂"
    bomb_emoji = "🚩"
    n = 0
    g_o=0
    id=0
    score = 0 
    def Insert_level(self,nb_bomb):
        self.nb_bomb = nb_bomb
        if nb_bomb == 19:
            self.score = 10
        elif nb_bomb == 27:
            self.score = 30
        elif nb_bomb == 40:
            self.score = 80
        while self.nb_bomb > 0:
            row = random.randint(0, 8)
            col = random.randint(0, 13)
            if self.array[row][col] == "0":  
                self.array[row][col] = "bomb"
                self.nb_bomb -= 1
        for x in range(9):
            for y in range(14):
                if self.array[x][y] == "bomb":
                    
                    try:
                        if ((x-1) != -1 ) and ((y-1) != -1):
                            if self.array[x-1][y-1] != "bomb":
                                self.array[x-1][y-1] = str(eval(self.array[x-1][y-1])+1)
                    except:
                        pass 
                    try:  
                        if ((x-1) != -1 ) and ((y) != -1): 
                            if self.array[x-1][y] != "bomb":   
                                self.array[x-1][y] = str(eval(self.array[x-1][y])+1)
                    except:
                        pass
                    try:
                        if ((x-1) != -1 ) and ((y+1) != -1):
                            if self.array[x-1][y+1] != "bomb": 
                                self.array[x-1][y+1] = str(eval(self.array[x-1][y+1])+1)    
                    except:
                        pass
                    try:
                        if ((x) != -1 ) and ((y-1) != -1):
                            if self.array[x][y-1] != "bomb": 
                                self.array[x][y-1] = str(eval(self.array[x][y-1])+1)    
                    except:
                        pass
                    try:
                        if ((x) != -1 ) and ((y+1) != -1):    
                            if self.array[x][y+1] != "bomb": 
                                self.array[x][y+1] = str(eval(self.array[x][y+1])+1)    
                    except:
                        pass
                    try:
                        if ((x+1) != -1 ) and ((y-1) != -1):
                            if self.array[x+1][y-1] != "bomb": 
                                self.array[x+1][y-1] = str(eval(self.array[x+1][y-1])+1)    
                    except:
                        pass
                    try:
                        if ((x+1) != -1 ) and ((y) != -1):
                            if self.array[x+1][y] != "bomb":
                                self.array[x+1][y] = str(eval(self.array[x+1][y])+1)    
                    except:
                        pass
                    try:
                        if ((x+1) != -1 ) and ((y+1) != -1):
                            if self.array[x+1][y+1] != "bomb": 
                                self.array[x+1][y+1] = str(eval(self.array[x+1][y+1])+1)
                    except:
                        pass    
                else :
                    continue
        for x in range(9):
            for y in range(14):
                if (self.array[x][y] != "0") and (self.array != "bomb"):
                    if self.array[x][y] == "1" :
                        self.colors[x][y] = "#0000ff" 
                    elif self.array[x][y] == "2" :
                        self.colors[x][y] = "#008000" 
                    elif self.array[x][y] == "3" :
                        self.colors[x][y] = "#ff0000" 
                    elif self.array[x][y] == "4" :
                        self.colors[x][y] = "#9400d3" 
                    elif self.array[x][y] == "5" :
                        self.colors[x][y] = "#8b0000" 
                    elif self.array[x][y] == "6" :
                        self.colors[x][y] = "#ffff00" 
                    elif self.array[x][y] == "7" :
                        self.colors[x][y] = "#ff4500" 
                    elif self.array[x][y] == "8" :
                        self.colors[x][y] = "#ff69b4"
                else:
                    continue 
        self.nb_bomb = nb_bomb
        self.nb_bomb_t = nb_bomb
    def change_face_emoji(self):
        if self.face_emoji == "🙁":
            self.face_emoji ="🙂"
        else:
            self.face_emoji = "🙁"
    def change_bomb_emoji(self):
        if self.bomb_emoji == "🚩":
            self.bomb_emoji ="💣"
        else:
            self.bomb_emoji = "🚩"
    def Insert_v_inv(self,x,y):
        if self.flag[x][y] == "":
            self.v_inv[x][y] = "v"
            if self.array[x][y] == "0" :
                try:
                    if ((x-1) != -1 ) and ((y-1) != -1):
                        if self.array[x-1][y-1] != "bomb" and self.v_inv[x-1][y-1] == "inv":
                            self.v_inv[x-1][y-1] = "v"
                            if self.array[x-1][y-1] =="0" :
                                self.Insert_v_inv(x-1,y-1)
                except:
                    pass 
                try:  
                    if ((x-1) != -1 ) and ((y) != -1): 
                        if self.array[x-1][y] != "bomb" and self.v_inv[x-1][y] == "inv":   
                            self.v_inv[x-1][y] = "v"
                            if self.array[x-1][y] == "0":
                                self.Insert_v_inv(x-1,y)
                except:
                    pass
                try:
                    if ((x-1) != -1 ) and ((y+1) != -1):
                        if self.array[x-1][y+1] != "bomb" and self.v_inv[x-1][y+1] == "inv": 
                            self.v_inv[x-1][y+1] = "v"
                            if self.array[x-1][y+1] =="0": 
                                self.Insert_v_inv(x-1,y+1)  
                except:
                    pass
                try:
                    if ((x) != -1 ) and ((y-1) != -1):
                        if self.array[x][y-1] != "bomb" and self.v_inv[x][y-1] == "inv": 
                            self.v_inv[x][y-1] = "v"
                            if self.array[x][y-1] == "0":
                                self.Insert_v_inv(x,y-1)
                except:
                    pass
                try:
                    if ((x) != -1 ) and ((y+1) != -1):    
                        if self.array[x][y+1] != "bomb" and self.v_inv[x][y+1] == "inv": 
                            self.v_inv[x][y+1] = "v"   
                            if self.array[x][y+1] == "0":
                                self.Insert_v_inv(x,y+1)
                except:
                    pass
                try:
                    if ((x+1) != -1 ) and ((y-1) != -1):
                        if self.array[x+1][y-1] != "bomb" and self.v_inv[x+1][y-1] == "inv": 
                            self.v_inv[x+1][y-1] = "v"
                            if self.array[x+1][y-1] =="0":
                                self.Insert_v_inv(x+1,y-1)    
                except:
                    pass
                try:
                    if ((x+1) != -1 ) and ((y) != -1):
                        if self.array[x+1][y] != "bomb" and self.v_inv[x+1][y] == "inv":
                            self.v_inv[x+1][y] = "v"
                            if self.array[x+1][y] == "0":
                                self.Insert_v_inv(x+1,y)   
                except:
                    pass
                try:
                    if ((x+1) != -1 ) and ((y+1) != -1):
                        if self.array[x+1][y+1] != "bomb" and self.v_inv[x+1][y+1] == "inv": 
                            self.v_inv[x+1][y+1] = "v"
                            if self.array[x+1][y+1] == "0":
                                self.Insert_v_inv(x+1,y+1)
                except:
                    pass
    def Insert_flag(self,x,y):
        if self.flag[x][y] == "" and self.nb_bomb_t > 0:
            self.flag[x][y] = "🚩"
        else:
            self.flag[x][y] = ""
    def nb_of_bomb(self):
        self.nb_bomb_t = self.nb_bomb
        for x in range(9):
            for y in range(14):
                if self.flag[x][y] == "🚩" :
                    self.nb_bomb_t -=1
    def game_over(self,x,y):
        if self.array[x][y] == "bomb" :
            self.g_o = 1
            self.n = 3
            con = db()
            insert_score(con, self.id, (-1*(self.score/2)))
    def victory(self):
        for x in range(9):
            for y in range(14):
                if self.v_inv[x][y] == "v":
                    continue
                elif self.v_inv[x][y] == "inv":
                    if self.flag[x][y] != "🚩": 
                        return
                    else:
                        if self.array[x][y] == "bomb" :
                            continue
                        elif self.array[x][y] != "bomb" :
                            return
        self.n = 3
        self.g_o = 2
        con = db()
        insert_score(con, self.id, self.score)
    def restart(self): 
        self.array = [["0"] * 14 for _ in range(9)]
        self.colors = [[""] * 14 for _ in range(9)]
        self.v_inv = [["inv"] * 14 for _ in range(9)]
        self.flag = [[""] * 14 for _ in range(9)]
        self.face_emoji = "🙂"
        self.bomb_emoji = "🚩"
        self.n = 0
        self.g_o=0