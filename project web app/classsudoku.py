import pymysql
import copy

class Sudoku_function:
    def db():
        host = "localhost"
        username = "root"
        password = ""
        db_name = "hok"
        con = pymysql.connect(host=host, user=username, password=password, database=db_name)
        return con

    def select_lis_sol(con, level):
        with con.cursor() as cursor:
            select_query = f"SELECT  lis , sol FROM sudoku_level_{level} WHERE id = 1"
            cursor.execute(select_query)
            result = cursor.fetchone()
            l, s = result
        return l, s
    def insert_score(con, id, score):
        cursor = con.cursor()
        sql = f"INSERT INTO scores(`user_id`, `game_id`, `score`, `date_played`, `created_at`, `updated_at`) VALUES ({id}, 1, {score}, NOW(), NOW(), NOW())"
        cursor.execute(sql)
        con.commit()
    def to_list(puzzle, sol):
        p = [[""] * 9 for _ in range(9)]
        s = [[""] * 9 for _ in range(9)]
        for x in range(9):
            for y in range(9):
                if puzzle[0:1] == "-":
                    puzzle = puzzle[1:]
                    continue
                else:
                    p[x].pop(y)
                    p[x].insert(y, puzzle[0:1])
                    puzzle = puzzle[1:]
        for x in range(9):
            for y in range(9):
                s[x].pop(y)
                s[x].insert(y, sol[0:1])
                sol = sol[1:]
        return p, s 

class Sudoku:
    array_of_pipe = ['|||||||||'] * 9
    colors = [[""] * 9 for _ in range(9)]
    nb = "1"
    n=0
    def Insert_level(self,level):
        if level == "easy":
            self.score = 10
        elif level == "normal":
            self.score = 30
        elif level == "hard":
            self.score = 80
        con = Sudoku_function.db()
        p, s = Sudoku_function.select_lis_sol(con, level)
        x, self.sol = Sudoku_function.to_list(p, s)
        self.puzzle = copy.deepcopy(x)
        self.puzzle_basic = copy.deepcopy(x)
        for a in range(9):
            for b in range(9):
                if self.puzzle_basic[a][b] != '':
                    self.colors[a].pop(b)
                    self.colors[a].insert(b, "white")
    def Insert_id(self, id):
        self.id = id
    def Insertion_into_arrays(self, x, y, nb):
        self.nb = nb
        if self.puzzle_basic[x][y] == "":
            if nb == "0":
                self.puzzle[x].pop(y)
                self.puzzle[x].insert(y, '')    
            elif nb == " ":
                nb = nb          
            else: 
                self.colors[x].pop(y)
                if nb == self.sol[x][y]:
                    self.colors[x].insert(y, "green")
                else:
                    self.colors[x].insert(y, "red")
                self.puzzle[x].pop(y)
                self.puzzle[x].insert(y, nb)

    def nb_pipe_basic(self):
        for a in range(9):
            for b in range(9):
                if self.puzzle[a][b] == '1':
                    self.array_of_pipe[0] = self.array_of_pipe[0][1:]
                elif self.puzzle[a][b] == '2':
                    self.array_of_pipe[1] = self.array_of_pipe[1][1:]
                elif self.puzzle[a][b] == '3':
                    self.array_of_pipe[2] = self.array_of_pipe[2][1:]
                elif self.puzzle[a][b] == '4':
                    self.array_of_pipe[3] = self.array_of_pipe[3][1:]
                elif self.puzzle[a][b] == '5':
                    self.array_of_pipe[4] = self.array_of_pipe[4][1:]
                elif self.puzzle[a][b] == '6':
                    self.array_of_pipe[5] = self.array_of_pipe[5][1:]
                elif self.puzzle[a][b] == '7':
                    self.array_of_pipe[6] = self.array_of_pipe[6][1:]
                elif self.puzzle[a][b] == '8':
                    self.array_of_pipe[7] = self.array_of_pipe[7][1:]
                elif self.puzzle[a][b] == '9':
                    self.array_of_pipe[8] = self.array_of_pipe[8][1:]

    def change_nb_pipe(self):
        self.array_of_pipe = ['|||||||||'] * 9
        for a in range(9):
            for b in range(9):
                if self.puzzle[a][b]:
                    num = int(self.puzzle[a][b]) - 1
                    if self.array_of_pipe[num]:
                        self.array_of_pipe[num] = self.array_of_pipe[num][1:]

    def end_nb(self):
        for i in range(9):
            if self.array_of_pipe[i] == '' and self.nb == str(i + 1):
                return 1
        return 0
    def restart(self):
        self.array_of_pipe = ['|||||||||'] * 9
        self.colors = [[""] * 9 for _ in range(9)]
        self.nb = "1"
        self.n=0
    def victory(self):
        if self.puzzle == self.sol:
            self.n = 2
            con = Sudoku_function.db()
            Sudoku_function.insert_score(con, self.id, self.score)