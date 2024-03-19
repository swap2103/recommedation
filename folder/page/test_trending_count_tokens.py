import json
import numpy
import json
import nltk
import pickle
from nltk.tokenize import word_tokenize 
from nltk.corpus import stopwords
from matplotlib import pyplot as plt
common_ts=["The","These","Their","Thought","Though","This","That"]

with open("search.json","r") as read_f:
    user_data=json.load(read_f)
    #user_searched Corpus

with open("Test_corpus.json","r") as read_f:
    corpus_data=json.load(read_f)
    #database and keywords corpus


##########################################################################################
#non-tokenized Array
words=[]
words=user_data['Array']
#non-tokenized Array

#flags for tokenizing
i=0
j=0
l=0
k=0
#flags

tk=[]
#input as [words]
#tokenizing
while i<(len(words)):
    #print(data[i])
    sample_tk=word_tokenize(words[i])
    for word in sample_tk:
        if word not in stopwords.words():
            tk.append(word)     
    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
while j != (len(tk)):
    for w_t in common_ts:
        if tk[j]==w_t:
            tk.remove(tk[j])
    j=j+1
#removing common

#cleaning corpus
while l != (len(tk)):
    k=l+1
    while k!=(len(tk)):
        if tk[l] == tk[k]:
            del tk[k]
            break
        k=k+1
    l=l+1
#cleaning corpus
#TOKENIZED USER_DATA

cf=0
#checking no of tokens to make it learn
if(len(tk)>1):
    cf=1
else:
    cf=0
#checking no of tokens to make it learn

####################################################################################

#TOKENIZING CORPUS_DATA
#non-tokenized Array
words2=[]
words2=corpus_data
#non-tokenized Array

#flags for tokenizing
i=0
j=0
l=0
k=0
#flags

tk1=[]
#input as [words]
#tokenizing
while i<(len(words2)):
    #print(data[i])
    sample_tk1=word_tokenize(words2[i])
    for word1 in sample_tk1:
        if word1 not in stopwords.words():
            tk1.append(word1)     
    i=i+1
#tokenizing
#final output [tk]


#removing common_ts
while j != (len(tk)):
    for w_t in common_ts:
        if tk1[j]==w_t:
            tk1.remove(tk[j])
    j=j+1
#removing common


#cleaning corpus
while l != (len(tk1)):
    k=l+1
    while k!=(len(tk1)):
        if tk1[l] == tk1[k]:
            del tk1[k]
            break
        k=k+1
    l=l+1
#cleaning corpus
#TOKENIZED CORPUS_DATA

################################################################################################

#data x,y positions
i=0
pos=[]
while(i!=len(tk)):
    j=0
    while(j!=len(tk1)):
        if(tk[i]==tk1[j]):
            pos.append(j)
        j=j+1
    i=i+1
#data x,y positions

print(len(pos))