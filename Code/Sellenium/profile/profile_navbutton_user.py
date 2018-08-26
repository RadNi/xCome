import unittest
from time import sleep

from selenium import webdriver
from test_utility import static_data
from test_utility import fields


class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()

    def test_profile_exam_reg(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("exam-reg").click()

        assert "exam-reg" in driver.current_url

    def test_profile_apply_pay(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("apply-pay").click()

        assert "apply-pay" in driver.current_url

    def test_profile_foreign_pay(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("foreign-pay").click()

        assert "foreign-pay" in driver.current_url

    def test_profile_ret_money(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("retr-mon").click()

        assert "ret-mon" in driver.current_url

    def test_profile_int_trans(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("int-pay").click()

        assert "int-trans" in driver.current_url

    def test_profile_wallet(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("wallet").click()

        assert "profile" in driver.current_url

    def tearDown(self):
        self.driver.close()
