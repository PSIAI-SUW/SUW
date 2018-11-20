import PyPDF2

file = open('watermark.pdf', 'rb')
reader = PyPDF2.PdfFileReader(file)
page = reader.getPage(0)
water = open('watermark.png', 'rb')
reader2 = PyPDF2.PdfFileReader(water)
page.mergePage(waterpage)
writer = PyPDF2.PdfFileWriter()
writer.addPage(page)

for pageNum in range(1, reader.numPages):
    pageObj = reader.getPage(pageNum)
    writer.addPage(pageObj)

resultFile = open('watermarkedbook.pdf', 'wb')
writer.write(resultFile)
file.close()
resultFile.close()

def loadFile():
    pass

def createSign():
    pass

def createWatermark():
    pass
