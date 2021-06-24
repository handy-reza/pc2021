#!/usr/bin/env python

import numpy as np
import pandas as pd
import sys
import getopt
import logging


def main(argv):
    Tt = ''
    Hh = ''
    Pp = ''

    try:
        opts, args = getopt.getopt(argv, "ht:u:p:",["Tt=","Hh=","Pp="])
    except getopt.GetoptError:
        print("not defined !!!!")
        print("\tlabel.py -h <help>")
        sys.exit(2)
    if  len(sys.argv) < 2:
        print("label.py -h <help>")
        sys.exit(2)
    for opt, arg in opts:
        if opt == '-h':
            print("label.py [options]")
            print("option lists :")
            print("\t-t [Temperature Value]")
            print("\t-u [Humidity Value]")
            print("\t-p [Pressure Value]")
            sys.exit()
        elif opt in ("-t", "--Tt"):
            Tt = arg
        elif opt in ("-u", "--Hh"):
            Hh = arg
        elif opt in ("-p", "--Pp"):
            Pp = arg

    filepath = r"C:\xampp\htdocs\pc2021\meteorological-singapore.csv"

    train = pd.read_csv(filepath)

    x = train.drop(columns=['Precipitation'])
    from sklearn import preprocessing
    ley = preprocessing.LabelEncoder()
    y = train.Precipitation
    y = ley.fit_transform(y)


    from sklearn.tree import DecisionTreeClassifier
    from sklearn import tree

    clf = tree.DecisionTreeClassifier(criterion = 'entropy', max_depth = 3)
    clf.fit(x,y)
    new = np.array([[float(Hh),float(Tt),float(Pp)]])
    res = clf.predict(new)
    print(ley.inverse_transform(res)[0])

if __name__ == "__main__":
    main(sys.argv[1:])