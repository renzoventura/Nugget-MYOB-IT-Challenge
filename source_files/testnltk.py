import nltk
from nltk.classify import NaiveBayesClassifier
from nltk.sentiment.vader import SentimentIntensityAnalyzer
from nltk.tokenize import word_tokenize
from nltk.corpus import movie_reviews
import random
import pickle

positive_reviews = open('rr.txt').readlines() 
review_list = []
for i in positive_reviews:
	i = i.strip("\n")
	review_list.append(i)
#negative_txt = open("neg-heliers.txt", "w")
#positive_txt = open("pos-heliers.txt", "w")
pickle_in = open("rr-train.pickle","rb")

train = pickle.load(pickle_in)

dictionary = set(word.lower() for passage in train for word in word_tokenize(passage[0]))

t = [({word: (word in word_tokenize(x[0])) for word in dictionary}, x[1]) for x in train]

classifier = nltk.NaiveBayesClassifier.train(t)

for x in review_list:
	test_data = x
	test_data_features = {word.lower(): (word in word_tokenize(test_data.lower())) for word in dictionary}
	#if classifier.classify(test_data_features) == 'neg':
	#	negative_txt.write(test_data)
	#	negative_txt.write("\n")
	#elif classifier.classify(test_data_features) == 'pos':
	#	positive_txt.write(test_data)
	#	positive_txt.write("\n")
#negative_txt.close()
#positive_txt.close()