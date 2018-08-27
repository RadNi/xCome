import unittest
from time import sleep

from selenium import webdriver
from test_utility import static_data
from test_utility import fields


class ExamRegister(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/exam-reg")

    def test_exam_reg_1(self):  # Assume Money > Needed
        self.driver.find_element_by_id('FEYZAM').click()
        self.driver.find_element_by_id('buy-butt').click()
        sleep(3)
        assert "successful" in self.driver.current_url

    def test_exam_1_fail(self): # Assume not enough money
        self.driver.find_element_by_id('EXPENSIVE').click()
        self.driver.find_element_by_id('buy-butt').click()
        sleep(2)
        assert "Enough" in self.driver.current_url

    def tearDown(self):
        self.driver.close()
