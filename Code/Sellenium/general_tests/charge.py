import unittest
from time import sleep

from selenium import webdriver

from test_utility import static_data, fields


# These Test could be also used by all pages have charge

class Charge(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()

    def test_app_pay_charge(self):
        before = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                     find_elements_by_tag_name("td")[1].text)
        fields.get_components_by_name(self.driver, ["amount=100", "buy"])[1].click()
        after = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                    find_elements_by_tag_name("td")[1].text)
        assert after - before == 100

    def test_app_pay_charge_empty(self):
        before = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                     find_elements_by_tag_name("td")[1].text)
        fields.get_components_by_name(self.driver, ["buy"])[0].click()
        after = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                    find_elements_by_tag_name("td")[1].text)
        assert after - before == 0

    def test_app_pay_charge_too_much(self):
        before = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                     find_elements_by_tag_name("td")[1].text)
        fields.get_components_by_name(self.driver, ["amount=10000000000", "buy"])[1].click()
        after = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                    find_elements_by_tag_name("td")[1].text)
        assert after - before == 0

    def test_app_pay_charge_too_low(self):
        before = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                     find_elements_by_tag_name("td")[1].text)
        fields.get_components_by_name(self.driver, ["amount=-2", "buy"])[1].click()
        after = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                    find_elements_by_tag_name("td")[1].text)
        assert after - before == 0

    def test_app_pay_charge_format(self):
        before = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                     find_elements_by_tag_name("td")[1].text)
        fields.get_components_by_name(self.driver, ["amount=as", "buy"])[1].click()
        after = int(self.driver.find_element_by_tag_name("tbody").find_elements_by_tag_name("tr")[0]. \
                    find_elements_by_tag_name("td")[1].text)
        assert after - before == 0

    def tearDown(self):
        self.driver.close()
