import unittest

from selenium import webdriver


class ExamRegister(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_exam_reg(self):   # Assume Money > Needed
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/exam-reg")
        exam1 = driver.find_element_by_id("exam1").find_element_by_id("buy-butt")
        exam1.click()

        assert driver.find_element_by_id("successful") is not None

    def test_exam_reg_fail(self):   # Assume Money < Needed
        driver= self.driver
        driver.get("http://127.0.0.1:8000/profile/exam-reg")
        exam2 = driver.find_element_by_id("exam2").find_element_by_id("buy-butt")
        exam2.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
